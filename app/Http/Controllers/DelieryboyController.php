<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\delieryboy;
class DelieryboyController extends Controller
{
    public function insert(Request $data)
    {
    	// $this->validate($data,[   
     //   "delivery_boy_name"=>"required|max:20|min:3|", //rules
     //   // "email"=>"required|max:30|min:8|email|unique:teachers",
     //   // "despriction"=>"required|max:50|min:6|",
     //   "phone_no"=>"required|max:10|min:3|",
     //   ]);

    	 $a = new delieryboy;
    	 $a->delivery_boy_name = $data->delivery_boy_name;
    	 $a->phone_no = $data->phone_no;
    	 $a->password = $data->password;
         $a->status = $data->status;
         $a->date_of_joining = $data->date_of_joining;

    	 $a->save();
    	 if ($a) {
    	 	return redirect('admin/add_boy')->with('message','data succesfuly inserted');
    	 }
    }

    public function edit($id)
    {
        $data = delieryboy::find($id);
        return view('admin.boy.edit',compact('data'));
    }

    public function update(Request $a)
    {
        $data = delieryboy::find($a->id);
         $data->delivery_boy_name = $a->delivery_boy_name;
         $data->phone_no = $a->phone_no;
         $data->password = $a->password;
         $data->status = $a->status;
         $data->date_of_joining = $a->date_of_joining;

         $data->save();
         if ($data) {
            return redirect('admin/add_boy')->with('message','data succesfuly updated');
         }

    }

    public function delete($id)
    {
        $data = delieryboy::find($id);
        $deleted = $data->delete();
        if ($deleted) {
            return redirect('admin/add_boy')->with('message','successfully deleted');
        }
    }
}
