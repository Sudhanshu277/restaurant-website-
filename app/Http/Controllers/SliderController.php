<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
class SliderController extends Controller
{
   public function insert(Request $data)
   {
   	  $file = $data->file('image');
      
      $filename = 'image'. time().'.'.$data->image->extension();
            
       $file->move("upload/",$filename);
         
         $data = new slider;

         $data->image = $filename;
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_slider");
         }
   }

   public function edit($id)
   {
   	$data = slider::find($id);
   	return view('admin.slider.edit',compact('data'));
   }

   public function update(Request $a)
   {


   	$file = $a->file('image');
      
    $filename = 'image'. time().'.'.$a->image->extension();
            
    $file->move("upload/",$filename);
         
  $data = slider::find($a->id);

         $data->image = $filename;
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_slider");
         }

   }

     public function delete($id)
    {
    	$data = slider::find($id);
    	$deleted = $data->delete();
    	if ($deleted) {
    		return redirect('admin/add_slider')->with('message','data deleted');
    	}
    }
}
