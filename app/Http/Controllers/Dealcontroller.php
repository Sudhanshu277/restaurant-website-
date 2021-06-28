<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deal;
class Dealcontroller extends Controller
{
    public function insert(Request $a)
    {
    	 $file = $a->file('image');
      
      $filename = 'image'. time().'.'.$a->image->extension();
            
       $file->move("upload/",$filename);

       $data = new deal;
       $data->description = $a->description;
       $data->image = $filename;

       $data->save();

       if ($data) {
       	  return redirect('admin/add_deal');
       }
    }

    public function edit($id)
    {
    	$data = deal::find($id);
    	return view('admin.deal.edit',compact('data'));
    }

    public function update(Request $a)
    {
    	   // print_r($a->all()); // hasFile check karta hai ki image ai hai ya ni
        if ($a->hasFile('image')) {
            $file = $a->file('image');
        // dd($file);//dump and die
        // exit;
        $filename = 'image'. time().'.'.$a->image->extension();
            // dd($filename);
            // exit;
         $file->move("upload/",$filename);
         //dd($file);
         //exit;
         $data = deal::find($a->id);
         $data->description = $a->description;
         $data->image = $filename;
        
         $data->save();
         if ($data) {
             return redirect('admin/add_deal');
         }
        }
        else{
             $data = deal::find($a->id);
             $data->description = $a->description;
             $data->save();
              if ($data) {
             return redirect('admin/add_deal');
         }
        }

    }
}
