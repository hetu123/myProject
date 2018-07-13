<?php

namespace App\Http\Controllers\admin;

use App\admin\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {

   }
   public function show($id){

       $images = Image::select('*')->where(['product_id' => $id])->get();
       return view('admin/image.index', compact('images'));
       /*foreach ($images as $img){
           echo $img->id;
       }
        ;die;*/
   }
   public function store(){
        echo 'hhii';
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
       return redirect('productimage')->with('success', 'Information has been added successfully');
   }
  /* public function crea{
  te()
   {
       $product_id = $_GET['id'];
       $images = Image::select('*')->where(['product_id' => $product_id])->get();
       return view('admin/image.create', compact('images'));
   }
   public function edit($id){}
    public function update(Request $request, $id)
    {

    }*/
  /*  public function show(){
        $product_id = $_GET['id'];
        $images = Image::select('*')->where(['product_id' => $product_id])->get();
        return view('admin/image.edit', compact('images'));
    }*/
   public function destroy($id){


       $image = Image::find($id);
        $product_id = $image->product_id;
       $image->delete();
       return redirect('productimage')->with('success','Information has been  deleted');
      // $images = Image::select('*')->where(['product_id' => $product_id])->get();

      // return view('admin/image.index', compact('images'));
      return redirect('admin/image.index')->with('success','Image has been  deleted');
   }
}
