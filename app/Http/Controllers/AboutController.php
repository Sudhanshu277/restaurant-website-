<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\about;
class AboutController extends Controller
{
    public function insert(Request $data)
    {
     $this->validate($data,[   
       "description"=>"required|max:50|min:3|", //rules
       // "email"=>"required|max:30|min:8|email|unique:teachers",
       // "despriction"=>"required|max:50|min:6|",
       "phone_no"=>"required",
       "image"=>"required",
       ]);
    	 $file = $data->file('image');
    	// dd($file);//dump and die
    	// exit;
    	$filename = 'image'. time().'.'.$data->image->extension();
            // dd($filename);
            // exit;
    	 $file->move("upload/",$filename);

    	 $a = new about;
    	 $a->description = $data->description;
    	 $a->phone_no = $data->phone_no;
    	 $a->image = $filename;

    	 $a->save();
    	 if ($a) {
    	 	return redirect('admin/add_about')->with('message','data succesfuly inserted');
    	 }
    }

    public function edit($id)
    {
    	$data = about::find($id);
    	return view('admin.about.edit',compact('data'));
    }

    public function update(Request $a)
    {
    	if ($a->hasFile('image')){
    		$file = $a->file('image');
    		$filename = 'image'. time().'.'.$a->image->extension();
    		$file->move("upload/",$filename);

    		$data = about::find($a->id);
    		$data->description = $a->description;
    		$data->image = $filename;
            $data->phone_no = $a->phone_no;
    		$data->save();
    		if ($data) {
    			return redirect('admin/add_about')->with('message','data succesfuly updated');
    		}
    	
    	}
    	else{
    		$data = about::find($a->id);
    		$data->description = $a->description;
            $data->phone_no = $a->phone_no;
    		$data->save();
    		if ($data) {
    			return redirect('admin/add_about')->with('message','data succesfuly updated');
    		  }
    		}
    }

     public function delete($id)
    {
    	$data = about::find($id);
    	$deleted = $data->delete();
    	if ($deleted) {
    		return redirect('admin/add_about')->with('message','data deleted');
    	}
    }
}
