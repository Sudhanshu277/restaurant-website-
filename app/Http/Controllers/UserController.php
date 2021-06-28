<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\slider;
use App\User;
use App\Cart;
use Auth;
use Session;
use Mail;

class UserController extends Controller
{
    public function user_register()
    {
    	$master = category::all();
    	$slider = slider::all();
    	return view('frontend.user.user_register',compact('master','slider'));
    }

   

    public function insert_register(Request $a)
    {
    	// print_r($a->all());
    	$data = $a->all();
        $user_count = User::where('email',$data['email'])->count();
        if ($user_count>0) {
        	return redirect()->back()->with('message','Email is already existed');
        }
        else
        {
        $user = new User;
                // print_r($user);
                // die();
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = bcrypt($data['password']);
        $user->address = $data['address'];
        $user->city = $data['city'];
        $user->country = $data['country'];
        $user->pin_code = $data['pin_code'];
        $user->phone = $data['phone'];
        $user->role = 1;
        $user->status = 0;
        $user->save();

        // Email Verification
        $email = $data['email'];
        $messageData=[
            'email' => $data['email'],
            'name' => $data['name'],
            'code' => base64_encode($data['email'])
            ];
        Mail::send('frontend.email_confirmation',$messageData,function($message) use($email)
                    {$message->to($email)->subject('Confirm your Email Account');
                });
        return redirect()->back()->with('message','Mail has been sent to your registered Email! Kindly verify your account.');
        }

    }

    public function confirmAccount($email)
    {
        $email = base64_decode($email);  // Check EMaill in database
        $userCount = User::where('email',$email)->count();
        if($userCount>0){
            // User Email already activated
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                // $message= "Your Email is already activated. please login.";
                return redirect('user_login')->with('message','Your Account is already activated. please login.');
            }else{
                User::where('email',$email)->update(['status' =>1]);
                return redirect('user_login')->with('message','Account Activated Successfully. kindly login!');
            }
        }else{
            abort(404);
        }


    }

    public function forget()
    {
        $master = category::all();
        return view('frontend.forget_email',compact('master'));
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
        Mail::send('frontend.email_forgetpassword',$messageData,function($message) use($email)
                    {$message->to($email)->subject('Reset Your Password');
                });
        return redirect()->back()->with('message','Mail has been sent to your registered Email!');
        }
    }

    public function mailsent($email)
    {
        $master = category::all();
        $email = base64_decode($email);  // Check EMaill in database
        return view('frontend.user.resetpassword',compact('email','master'));

    }

    public function passwordupdate(Request $a)
    {
        $da = $a->all();
        $data =  User::where('email',$da['email'])->update(['password' =>bcrypt($da['password'])]);
        // print_r($data);
        // die
       if ($data) {
           return redirect('user_login')->with('message','password succesfuly updated');
       }
       else{
          return redirect('user_login')->with('message','password not updated');
       }
    }

     public function user_login()
    {
    	$master = category::all();
    	$slider = slider::all();
    	return view('frontend.user.user_login',compact('master','slider'));
    }


    public function login_insert(Request $a)
    {
    	  $session_id = Session::getId(); 
         // print_r($session_id);
        // die;
     // print_r($a->all());
    	$data = $a->all();

        $role_type = User::where('email',$data['email'])->first();
       
        
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'], 'role'=>$data['role']]))
        {
            if ($role_type->status==1) {
            if($role_type->role==1)
            {
                Session::put('front_session',$data['email']);
                Cart::where('session_id',$session_id)->update(['user_email'=>$a->email]);
                return redirect('/');
            }
            }
            elseif ($role_type->role==0) 
            {
                return redirect('admin/dashboard');
            }
            else{
            return redirect()->back()->with('message','Please verify your email');
        }
        }
        else
        {
            return redirect()->back()->with('message','Invaild Username or password');
        }
        
        

        
    }

    public function logout()
    {
        Session::forget('Frontlogin');
    	Auth::logout();
    	return redirect("/");
    }
}
