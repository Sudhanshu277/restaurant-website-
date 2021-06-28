<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // unique id ke liye
use DB;
use App\about;
use App\slider;
use App\category;
use App\dish;
use App\addimage;
use App\deal;
use App\Cart;
use App\DishOrder;
use App\DishItem;
use App\User;
use App\coupon;
use Carbon\Carbon;
use App\Review;
use Mail;
use Session;
use Auth;
class FrontendController extends Controller
{
    public function home()
    {
    	$data = about::all();
    	$slider = slider::all();
    	// $category = category::all();
        $category = DB::table('categories')->Limit(6)->get();
        $deal = deal::all();
        $master = category::all();
        $b = DB::table('dishes')->where(['category_id'=>1])->Limit(3)->get();
        $c = DB::table('dishes')->where(['category_id'=>2])->Limit(3)->get();
        $a = DB::table('dishes')->where(['category_id'=>3])->Limit(3)->get();
    	return view('frontend.index',compact('data','category','slider','deal','b','c','a','master'));
    }
    
    public function contact()
    {
        $master = category::all();
        return view('frontend.contact',compact('master'));
    }
    public function detail($id)
    {
        $master = category::all();
    	$category = category::all();
    	$cat = category::find($id);
    	$data = DB::table('dishes')->where(['category_id'=>$id])->get();
    	return view('frontend.detail',compact('data','category','cat','master'));
    }

    public function d($id)
    {
        $review = Review::where('dish_id',$id)->get();
        $avg_rate = Review::where(['dish_id'=>$id])->avg('rating');
        $rate1 = Review::where(['dish_id'=>$id,'rating'=>1])->avg('rating');
        $rate2 = Review::where(['dish_id'=>$id,'rating'=>2])->avg('rating');
        $rate3 = Review::where(['dish_id'=>$id,'rating'=>3])->avg('rating');
        $rate4 = Review::where(['dish_id'=>$id,'rating'=>4])->avg('rating');
        $rate5 = Review::where(['dish_id'=>$id,'rating'=>5])->avg('rating');
        $dat = dish::find($id);
        $master = category::all();
        $data =  DB::table('addimages')->where(['dish_id'=>$id])->get();
        return view('frontend.d',compact('data','dat','master','review','avg_rate','rate1','rate2','rate3','rate4','rate5'));
    }

    public function allcategory()
    {
        $data = category::all();
        $master = category::all();
        return view('frontend.allcategory',compact('data','master'));
    }
    
    public function addtocart(Request $data)    
    {
        // print_r($data->all());
            if(Auth::check()){
         $useremail = Auth::user()->email;
          $session_id = Session::getId();
         // print_r($session_id);
         // die;
         $a = new Cart;
         $a->user_email = $useremail;
         $a->dish_id = $data->dish_id;
         $a->dish_name = $data->dish_name;
         $a->dish_price = $data->dish_price;
         $a->dish_image = $data->dish_image;
         $a->dish_quantity = $data->dish_quantity;
         $a->session_id = $session_id;
         $a->save();
         // print_r($a)
         if ($a) {
             # code...
            return redirect("frontend/cart");
         }
        }
        else{
             $session_id = Session::getId();
         // print_r($session_id);
         // die;
         $a = new Cart;
         $a->dish_id = $data->dish_id;
         $a->dish_name = $data->dish_name;
         $a->dish_price = $data->dish_price;
         $a->dish_image = $data->dish_image;
         $a->dish_quantity = $data->dish_quantity;
         $a->session_id = $session_id;
         $a->save();
         // print_r($a)
         if ($a) {
             # code...
            return redirect("frontend/cart");
         }
        }
       
        
    }
    public function cart()
    {
        if(Auth::check()){
         $useremail = Auth::user()->email;
         $cart = Cart::where('user_email',$useremail)->get();
        }
        else{
             $session_id = Session::getId();
         //  print_r($session_id);
         // die;
        // $cart = Cart::all();

        $cart = Cart::where('session_id',$session_id)->get();
      
      
        }
        $master = category::all();
        return view('frontend.cart',compact('cart','master'));
       
    }

    public function delete($id)
    {
      $data = Cart::find($id);
      $deleted = $data->delete();
      if ($deleted) {
          return redirect('frontend/cart');
      }
    }

    public function checkout()
    {
        $useremail = Auth::user()->email;
        $cart = Cart::where('user_email',$useremail)->count();
        // echo $cart;
        // die;
        if ($cart != 0) {
            if(Auth::check()){
                $useremail = Auth::user()->email;
                $cart = Cart::where('user_email',$useremail)->get();
            }
            else{
                $session_id = Session::getId();
         //  print_r($session_id);
         // die;
        // $cart = Cart::all();
                $cart = Cart::where('session_id',$session_id)->get();
            }
            $master = category::all();
            return view('frontend.checkout',compact('master','cart'));
        }
        else{
            return redirect()->back()->with('alert','hello');
            echo "alert('hello');";
        }
         
        
    }

    public function update_quantity($id,$dish_quantity)
    {
       DB::table('carts')->where('id',$id)->increment('dish_quantity',$dish_quantity);
        return redirect()->back()->with('message','Dish quantity updated');
    }

    public function placeOrder(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all());

        $data = new DishOrder;

        $data->user_id = $a->user_id;
        $data->user_email = $a->user_email;
        $data->name = $a->name;
        $data->address = $a->address;
        $data->city = $a->city;
        $data->country = $a->country;
        $data->phone_num = $a->phone_num;
        $data->pin_code = $a->pin_code;
        $data->payment_method = $a->payment_method;
        $data->grand_total = $a->grand_total;
        $data->order_status = 'Pending';
        $data->order_id = Str::random(10);

        $data->save();
        
        $order_id = DB::getPdo()->lastInsertID();
        // print_r($order_id);
        // die;

       $dish_item = Cart::where('user_email',$data->user_email)->get();
       // echo "<pre>";
       // print_r($dish_item);
       foreach ($dish_item as $items)

        {
           $dishs = new DishItem;
           $dishs->order_id = $order_id;
           $dishs->dish_name = $items->dish_name;
           $dishs->dish_price = $items->dish_price;
           $dishs->dish_image = $items->dish_image;
           $dishs->dish_quantity = $items->dish_quantity;
           $dishs->dish_size = $items->dish_size;
           $dishs->user_email = $items->user_email;
           $dishs->user_id = $items->user_id;

           $dishs->save();
       }

       if($data['payment_method']=='cod')
       {
        $user = User::where('email',$a->user_email)->first(); 
        $to = $a->user_email;
        // dd($user);
        $id = $data->id;
        $corder = DishOrder::all();
        $corderd = DishItem::where('order_id',$id)->get();
        $subject = 'User Order Successful';
        $message = "Your Order Is Successful In PnInfosys Course Program \n\n"; 
        Mail::send('frontend.order_email', ['msg' => $message,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            });
        return redirect('thanks');
       }
       elseif($data['payment_method']=='paytm')
       {
        $amount = $a->grand_total;
        $order_id = $data->order_id;
        // echo $amount;
        // echo $order_id;
        $data_for_request = $this->handlePaytmRequest( $order_id, $amount );
        // print_r($data_for_request);
        // die;


        $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
        $paramList = $data_for_request['paramList'];
        $checkSum = $data_for_request['checkSum'];
        $user = User::where('email',$a->user_email)->first(); 
        $to = $a->user_email;
        // dd($user);
        $id = $data->id;
        $corder = DishOrder::all();
        $corderd = DishItem::where('order_id',$id)->get();
        $subject = 'User Order Successful';
        $message = "Your Order Is Successful In PnInfosys Course Program \n\n"; 
        Mail::send('frontend.order_email', ['msg' => $message,'corder' => $corder,'corderd' => $corderd,'id' => $id, 'user' => $user] , function($message) use ($to){ 
                $message->to($to, 'User')->subject('User Order');  
            });

        return view( 'paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
       
       }
        
    }

    ///Paytm code ////////////////////////////////////////////////
       public function handlePaytmRequest( $order_id, $amount ) {
            // Load all functions of encdec_paytm.php and config-paytm.php
            $this->getAllEncdecFunc();
            $this->getConfigPaytmSettings();

            $checkSum = "";
            $paramList = array();

            // Create an array having all required parameters for creating checksum.
            $paramList["MID"] = 'aoShEI26431307388038';
            $paramList["ORDER_ID"] = $order_id;
            $paramList["CUST_ID"] = $order_id;
            $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
            $paramList["CHANNEL_ID"] = 'WEB';
            $paramList["TXN_AMOUNT"] = $amount;
            $paramList["WEBSITE"] = 'WEBSTAGING';
            $paramList["CALLBACK_URL"] = url( '/paytm-callback' );
            $paytm_merchant_key = '38D!#nqbroqz9M#H';

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

        return array(
            'checkSum' => $checkSum,
            'paramList' => $paramList
        );
    }

    public function paytmCallback( Request $request ) {
            // return $request;
        $order_id = $request['ORDERID'];

        if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
            $transaction_id = $request['TXNID'];
            $order = DishOrder::where( 'order_id', $order_id )->first();
            $order->payment_status = 'complete';
            $order->transaction_id = $transaction_id;
            $order->save();
            $user_email = Auth::user()->email;
            Cart::where('user_email',$user_email)->delete();
            $master = category::all();  
            return view('frontend.order_complete',compact('order','master'));
           
          
} else if( 'TXN_FAILURE' === $request['STATUS'] ){
            return view( 'payment-failed' );
        }
}

    public function thanks()
    {  
        $master = category::all();
        $user_email = Auth::user()->email;
        Cart::where('user_email',$user_email)->delete();
        $data = DishOrder::where('user_email',$user_email)->get();
        return view('frontend.thanks',compact('data','master'));
    }

    public function myaccount()
    {
        $master = category::all();
        return view('frontend.myaccount',compact('master'));
    }

    public function orderitem()
    {
        $master = category::all();
        $user_email = Auth::user()->email;
        // print_r($user_email);
        $item = DB::table('dish_items')
            ->join('dish_orders', 'dish_items.order_id', '=', 'dish_orders.id')->where('dish_items.user_email',$user_email)->get();
        // $item = DishItem::where('user_email',$user_email)->get();
        return view('frontend.orderitem',compact('master','item'));
    }

    public function address()
    {
        $master =  category::all();
        return view('frontend.address',compact('master'));
    }

    public function edit_address(Request $data)
    {
        $a = User::find($data->user_id);
        // print_r($a);
        $a->id = $data->user_id;
        $a->email = $data->user_email;
        $a->name = $data->name;
        $a->address = $data->address;
        $a->city = $data->city;
        $a->country = $data->country;
        $a->phone = $data->phone_num;
        $a->pin_code = $data->pin_code;
        $a->save();
        if ($a) {
            return redirect('address');
        }


    }

    public function search_item(Request $a)
  {
    // print_r($a->all());
    $master = category::all();
    $category = category::all();
    $dish = dish::where('dish_name', 'like' , '%' . $a->input('quary') .'%')->get(); 
    return view('frontend.search_item',compact('dish','master','category'));
    
  }

  #coupon code apply
   public function coupon_code_apply(Request $a)
     {
      Session::forget('couponamount');
      Session::forget('coupon');
      // print_r($a->all());
      // die;
        $data = $a->all();
        $coupon_count = coupon::where('coupon_code',$data['coupon'])->count();
      //   print_r($coupon_count);
      // die;
        if ($coupon_count == 0) 
         {
          return redirect()->back()->with('massage','coupon code does not exits'); 
         }else
         {
            //echo "success";
            $coupon = coupon::where('coupon_code',$data['coupon'])->first();
            //check coupon code status
            if ($coupon->status==0)
             {
               return redirect()->back()->with('massage','coupon code  is not active'); 
             }
            //check coupon ecpity date
             $date = $coupon->expired_on;           
             $current_date = Carbon::now();

             if ($date < $current_date ) 
             {
                return redirect()->back()->with('massage','coupon  date is expired'); 
             }
        //coupon id ready for discount
           $session_id = Session::getId();
           $usercart = DB::table('carts')->where('session_id',$session_id)->get();
          $total_amount = 0;
          foreach ($usercart as $item) 
          {
             $total_amount = $total_amount +($item->dish_price * $item->dish_quantity);
          }

          //check if coupon id fixed and parcentage
           if ($coupon->coupon_type=='Fixed') 
           {
               $couponamount = $coupon->coupon_value;
           }else
           {
              $couponamount = $total_amount *($coupon->coupon_value/100);
           }
           //add coupon code in session
           Session::put('couponamount', $couponamount);
           Session::put('coupon',$data['coupon']);
           return redirect()->back()->with('massage','coupon code is succussfully applied');
         }
     }

    // paytm method
    public function getAllEncdecFunc(){


function encrypt_e($input, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function decrypt_e($crypt, $ky) {
    $key   = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
    return $data;
}
function generateSalt_e($length) {
    $random = "";
    srand((double) microtime() * 1000000);
    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";
    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}
function checkString_e($value) {
    if ($value == 'null')
        $value = '';
    return $value;
}
function getChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getChecksumFromString($str, $key) {
    
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function verifychecksum_e($arrayList, $key, $checksumvalue) {
    $arrayList = removeCheckSumParam($arrayList);
    ksort($arrayList);
    $str = getArray2StrForVerify($arrayList);
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function verifychecksum_eFromStr($str, $key, $checksumvalue) {
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);
    $finalString = $str . "|" . $salt;
    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;
    $validFlag = "FALSE";
    if ($website_hash == $paytm_hash) {
        $validFlag = "TRUE";
    } else {
        $validFlag = "FALSE";
    }
    return $validFlag;
}
function getArray2Str($arrayList) {
    $findme   = 'REFUND';
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {
        $pos = strpos($value, $findme);
        $pospipe = strpos($value, $findmepipe);
        if ($pos !== false || $pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function getArray2StrForVerify($arrayList) {
    $paramStr = "";
    $flag = 1;
    foreach ($arrayList as $key => $value) {
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function redirect2PG($paramList, $key) {
    $hashString = getchecksumFromArray($paramList);
    $checksum = encrypt_e($hashString, $key);
}
function removeCheckSumParam($arrayList) {
    if (isset($arrayList["CHECKSUMHASH"])) {
        unset($arrayList["CHECKSUMHASH"]);
    }
    return $arrayList;
}
function getTxnStatus($requestParamList) {
    return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}
function getTxnStatusNew($requestParamList) {
    return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}
function initiateTxnRefund($requestParamList) {
    $CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
    $requestParamList["CHECKSUM"] = $CHECKSUM;
    return callAPI(PAYTM_REFUND_URL, $requestParamList);
}
function callAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function callNewAPI($apiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
    'Content-Type: application/json', 
    'Content-Length: ' . strlen($postData))                                                                       
    );  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
    if ($sort != 0) {
        ksort($arrayList);
    }
    $str = getRefundArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getRefundArray2Str($arrayList) {   
    $findmepipe = '|';
    $paramStr = "";
    $flag = 1;  
    foreach ($arrayList as $key => $value) {        
        $pospipe = strpos($value, $findmepipe);
        if ($pospipe !== false) 
        {
            continue;
        }
        
        if ($flag) {
            $paramStr .= checkString_e($value);
            $flag = 0;
        } else {
            $paramStr .= "|" . checkString_e($value);
        }
    }
    return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
    $jsonResponse = "";
    $responseParamList = array();
    $JsonData =json_encode($requestParamList);
    $postData = 'JsonData='.urlencode($JsonData);
    $ch = curl_init($apiURL);   
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $refundApiURL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
    $jsonResponse = curl_exec($ch);   
    $responseParamList = json_decode($jsonResponse,true);
    return $responseParamList;
}

    }

    function getConfigPaytmSettings(){

        define('PAYTM_ENVIRONMENT', 'PROD'); // PROD
        define('PAYTM_MERCHANT_KEY', 'EBPwh5dj_XmW1L7%'); //Change this constant's value with Merchant key received from Paytm.
        define('PAYTM_MERCHANT_MID', 'EbtGYn83534967686723'); //Change this constant's value with MID (Merchant ID) received from Paytm.
        define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //Change this constant's value with Website name received from Paytm.
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/order/status';
        $PAYTM_TXN_URL='https://securegw-stage.paytm.in/order/process';
        if (PAYTM_ENVIRONMENT == 'PROD') {
        $PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
        $PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
    }
        define('PAYTM_REFUND_URL', '');
        define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
        define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
    }


  
}