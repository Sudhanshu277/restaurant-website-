<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\delieryboy;
use App\coupon;
use App\dish;
use App\about;
use App\slider;
use App\dishimage;
use App\deal;
use App\DishOrder;
use App\DishItem;
use App\User;
use Mail;
use DB;

class AdminController extends Controller
{
	
    public function dashboard()
    {
        $category = DB::table('categories')->count();
        $dish = DB::table('dishes')->count();
        $user = DB::table('users')->count();
        $in = DB::table('dish_orders')->where(['order_status'=>'In Making'])->count();
        $pa = DB::table('dish_orders')->where(['order_status'=>'Packed'])->count();
        $sk = DB::table('dish_orders')->where(['order_status'=>'Skiped'])->count();
        $fa = DB::table('dish_orders')->where(['order_status'=>'Failed'])->count();
    	return view('admin.dashboard',compact('category','dish','user','in','pa','sk','fa'));
    }
    public function category()
    {
    	$data = category::all();
    	$i = 1;
    	return view('admin.category.add_category',compact('data','i'));
    }
    public function boy()
    {
        $data = delieryboy::all();
        $i = 1;
        return view('admin.boy.add_boy',compact('data','i'));
    }

    public function coupon()
    {
        $data = coupon::all();
        $i = 1;
        return view('admin.coupon.add_coupon',compact('data','i'));
    }

    public function dish()
    {
        $data = dish::all();
        $d = category::all();
        return view('admin.dish.add_dish',compact('data','d'));
    }

    public function about()
    {
        $data = about::all();
        $i = 1;
        return view('admin.about.add_about',compact('data','i'));
    }

    public function slider()
    {
        $data = slider::all();
        $i = 1;
        return view('admin.slider.add_slider',compact('data','i'));
    }

    public function deal()
    {
        $data = deal::all();
        return view('admin.deal.add_deal',compact('data'));
    }

    public function order()
    {
        $data=Dishorder::orderBy('id','desc')->get();
        $in = DB::table('dish_orders')->where(['order_status'=>'In Making'])->count();
        $pa = DB::table('dish_orders')->where(['order_status'=>'Packed'])->count();
        $sk = DB::table('dish_orders')->where(['order_status'=>'Skiped'])->count();
        $fa = DB::table('dish_orders')->where(['order_status'=>'Failed'])->count();
        return view('admin.order.see_order',compact('data','in','pa','sk','fa'));
    }

    public function item($id)
    {
        $data = DishItem::where('order_id',$id)->get();
        return view('admin.order.item',compact('data'));
    }

    public function invoice($id)
    {
        $user = DishOrder::find($id);
        $item = DishItem::where('order_id',$id)->get();
        $items = DishItem::where('order_id',$id)->first();
        return view('admin.order.invoice',compact('user','item','items'));
    }

    public function order_status(Request $a)
    {
        // $data = $a->all();
        // print_r($data);
        $data = DishOrder::find($a->id);
        // print_r($data);
        $data->order_status  = $a->order_status;
        $data->save();
        if ($data) {
            return redirect('admin/see_order');
        }
    }

    public function forget_password()
    {
        return view('auth.forget_email');
    }

     public function passwordmail(Request $a)
    {
        $data = $a->all();
        // print_r($data);
       $user_count = User::where('email',$data['email'])->count();
       // print_r($user_count);
       // die;
       if ($user_count == 0) {
            return redirect()->back()->with('message','Email does not existed with our database');
        }
        else{
             // Email Verification
        $email = $data['email'];
        $messageData=[
            'email' => $data['email'],
            'code' => base64_encode($data['email'])
            ];
        Mail::send('auth.email_forgetpassword',$messageData,function($message) use($email)
                    {$message->to($email)->subject('Reset Your Password');
                });
        return redirect()->back()->with('message','Mail has been sent to your registered Email!');
        }
    }
     public function mailsent($email)
    {
        $master = category::all();
        $email = base64_decode($email);  // Check EMaill in database
        return view('auth.resetpassword',compact('email','master'));

    }

     public function passwordupdate(Request $a)
    {
        $da = $a->all();
        $data =  User::where('email',$da['email'])->update(['password' =>bcrypt($da['password'])]);
        // print_r($data);
        // die
       if ($data) {
           return redirect('login')->with('message','password succesfuly updated');
       }
       else{
          return redirect('login')->with('message','password not updated');
       }
    }

}
