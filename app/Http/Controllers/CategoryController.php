<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
    public function insert(Request $data)
    {
    	$this->validate($data,[   
       "tittle"=>"required|max:20|min:3|", //rules
       // "email"=>"required|max:30|min:8|email|unique:teachers",
       // "despriction"=>"required|max:50|min:6|",
       "image"=>"required",
       ]);
    	 $file = $data->file('image');
    	// dd($file);//dump and die
    	// exit;
    	$filename = 'image'. time().'.'.$data->image->extension();
            // dd($filename);
            // exit;
    	 $file->move("upload/",$filename);

    	 $a = new category;
    	 $a->tittle = $data->tittle;
    	 $a->image = $filename;
         $a->status = $data->status;
         $a->date = $data->date;

    	 $a->save();
    	 if ($a) {
    	 	return redirect('admin/add_category')->with('message','data succesfuly inserted');
    	 }

    }

    public function edit($id)
    {
    	$data = category::find($id);
    	return view('admin.category.edit',compact('data'));
    }

    public function update(Request $a)
    {
    	if ($a->hasFile('image')){
    		$file = $a->file('image');
    		$filename = 'image'. time().'.'.$a->image->extension();
    		$file->move("upload/",$filename);

    		$data = category::find($a->id);
    		$data->tittle = $a->tittle;
    		$data->image = $filename;
            $data->status = $a->status;
            $data->date = $a->date;
    		$data->save();
    		if ($data) {
    			return redirect('admin/add_category');
    		}
    	
    	}
    	else{
    		$data = category::find($a->id);
    		$data->tittle = $a->tittle;
            $data->status = $a->status;
            $data->date = $a->date;
    		$data->save();
    		if ($data) {
    			return redirect('admin/add_category');
    		  }
    		}
    }

    public function delete($id)
    {
    	$data = category::find($id);
    	$deleted = $data->delete();
    	if ($deleted) {
    		return redirect('admin/add_category')->with('message','data deleted');
    	}
    }
}
