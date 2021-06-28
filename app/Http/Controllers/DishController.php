<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dish;
use App\category;
use App\addimage;
use DB;
class DishController extends Controller
{
     public function save(Request $a)
    {
       //  $this->validate($a,[   
       // "title"=>"required|max:50|min:3|", //rules
       // "image"=>"required",
      
       

       //  ]);
     
      $file = $a->file('dish_image');
      
      $filename = 'dish_image'. time().'.'.$a->dish_image->extension();
            
       $file->move("upload/",$filename);
         
         $data = new Dish;
         $data->dish_name = $a->dish_name;
         $data->dish_description = $a->dish_description;
         $data->dish_image = $filename;
         $data->dish_status = $a->dish_status;
         $data->price = $a->price;
         $data->quantity = $a->quantity;
         $data->category_id = $a->category_id;
        
         

        
         $data->save();
         if ($data) {
             # code...
            return redirect("admin/add_dish");
         }
    } 

     public function delete($id)
    {
        // echo $id;
        $data = Dish::find($id);
        $deleted = $data->delete();
        if ($deleted) 
        {
             return redirect('admin/add_dish')->with('message','Successfully Deleted');
        }
    }

     public function edit($id)
    {
        // echo "edit";
        $data = Dish::find($id);
        $d = category::all();
        return view('admin.dish.edit',compact('data','d'));
    }

    public function update(Request $a)
    {
        // echo "<pre>";
        // print_r($a->all()); // hasFile check karta hai ki image ai hai ya ni
        if ($a->hasFile('dish_image')) {
            $file = $a->file('dish_image');
        // dd($file);//dump and die
        // exit;
        $filename = 'dish_image'. time().'.'.$a->dish_image->extension();
            // dd($filename);
            // exit;
         $file->move("upload/",$filename);
         //dd($file);
         //exit;
         $data = dish::find($a->id);
         $data->dish_name = $a->dish_name;
         $data->dish_description = $a->dish_description;
         $data->dish_image = $filename;
         $data->dish_status = $a->dish_status;
         $data->price = $a->price;
         $data->quantity = $a->quantity;
         $data->category_id = $a->category_id;
        
         $data->save();
         if ($data) {
             return redirect('admin/add_dish');
         }
        }
        else{
             $data = dish::find($a->id);
             $data->dish_name = $a->dish_name;
	         $data->dish_description = $a->dish_description;
	         $data->dish_status = $a->dish_status;
	         $data->price = $a->price;
	         $data->quantity = $a->quantity;
	         $data->category_id = $a->category_id;
	        
             
             $data->save();
              if ($data) {
             return redirect('admin/add_dish');
         }
        }
      
    }

    public function add_image($id)
    {
        $id = $id;
      //addimage::find($id);
       $data =  DB::table('addimages')->where(['dish_id'=>$id])->get();
        $i = 1;
        return view('admin.dish.add_image',compact('id','data','i'));
    }

    public function insert_image(Request $a)
    {
       $file = $a->file('image');
      
      $filename = 'image'. time().'.'.$a->image->extension();
            
       $file->move("upload/",$filename);

       $data = new addimage;
       $data->dish_id = $a->dish_id;
       $data->image = $filename;
       $data->status = $a->status;

       $data->save();

       if ($data) {
          return redirect('dish/add_image/'.$data->dish_id);
       }
    }

    public function edit_image($id)
    {
      $data = addimage::find($id);
      return view('admin.dish.edit_image',compact('data'));
    }

    public function update_image(Request $a)
    {
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
         $data = addimage::find($a->id);
         $data->image = $filename;
         $data->status = $a->status;
         $data->dish_id = $a->dish_id;
         $data->save();
         if ($data) {
             // return redirect('admin/add_image');
          return redirect('dish/add_image/'.$data->dish_id)->with('message','data succesfuly updated');
         }
        }
        else{
            $data = addimage::find($a->id);
            $data->status = $a->status;
            $data->dish_id = $a->dish_id;
            $data->save();
            if ($data) {
             return redirect('dish/add_image/'.$data->dish_id);
            }
        }
    }
     public function delete_image($id)
    {
        $data = addimage::find($id);
        $deleted = $data->delete();
        if ($deleted) {
          return redirect('dish/add_image/'.$data->dish_id)->with('message','successfully deleted');
        }
    }
}
