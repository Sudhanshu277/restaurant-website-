<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;
class CouponController extends Controller
{
    public function insert(Request $data)
    {
      $a = new coupon;
      $a->coupon_code = $data->coupon_code;
      $a->coupon_type = $data->coupon_type;
      $a->coupon_value = $data->coupon_value;
      $a->cart_min_value = $data->cart_min_value;
      $a->expired_on = $data->expired_on;
      $a->status = $data->status;
      $a->datetime = $data->datetime;

      $a->save();
      if ($a) {
      	return redirect('admin/add_coupon')->with('message','data inserted successfully');
      }
    }

    public function edit($id)
    {
    	$data = coupon::find($id);
    	return view('admin.coupon.edit',compact('data'));
    }

    public function update(Request $a)
    {
    	$data = coupon::find($a->id);
        
      $data->coupon_code = $a->coupon_code;
      $data->coupon_type = $a->coupon_type;
      $data->coupon_value = $a->coupon_value;
      $data->cart_min_value = $a->cart_min_value;
      $data->expired_on = $a->expired_on;
      $data->status = $a->status;
      $data->datetime = $a->datetime;

      $data->save();
      if ($data) {
      	return redirect('admin/add_coupon')->with('message','data successfully updated');
      }
    }

    public function delete($id)
    {
    	$data= coupon::find($id);
    	$deleted = $data->delete();

    	if ($deleted) {
    		return redirect('admin/add_coupon')->with('message','data deleted');
    	}
    }
}

