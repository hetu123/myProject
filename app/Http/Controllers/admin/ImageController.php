<?php

namespace App\Http\Controllers\admin;

use App\admin\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index(){
   }
   public function show($id){
       $images = Image::select('*')->where(['product_id' => $id])->get();
       return view('admin/image.index', compact('images'));
   }
   public function store(){
   }
   public function update(Request $request,$id){
       $images=array();
       if($files=$request->file('images')){
           foreach($files as $file){
               $name=$file->getClientOriginalName();
               $file->move(public_path().'/images/', $name);
               $images[]=$name;
           }
       }
       foreach ($images as $img){
           $image = new Image();
           $image->product_id = $id;
           $image->image = $img;
           $image->save();
       }
       return $this->show($id);
   }

   public function destroy($id){
       $image = Image::find($id);
       $product_id = $image->product_id;
       $image->delete();
       return $this->show($product_id);
   }
   public function __construct(){

   }
}
