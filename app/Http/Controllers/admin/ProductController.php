<?php

namespace App\Http\Controllers\admin;

use App\admin\Category;
use App\admin\Image;
use App\admin\Product;
use App\admin\ProductCategory;
use App\admin\ProductImage;
use App\API\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\InstanceMockPass;

class ProductController extends Controller
{
    public function index(){
      $products = Product::latest()->paginate();

      return view('admin/product.index',compact('products'))->with('i',(\request()->input('page',1)-1)*5);
    }

    public function create(){
        $category=DB::table('category')->where('pid','<>', '0')->get();
        return view('admin/product.create',compact('category'));
    }

    public function store(Request $request){
        $name='';
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
                $images[]=$name;
            }
        }
        if($request->hasfile('coverImage'))
        {
            $file = $request->file('coverImage');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $category_ids =$request->get('select_preferences');
        if(empty($category_ids)){
            return redirect('product/create')->with('success', 'Plz select category');
        }
        $product = new Product();
        $product->title = $request->get('name');
        $product->is_active = $request->get('active');
        $product->is_populer = $request->get('populer');
        $product->description = $request->get('description');
        $product->cover_image =  $name;
        if($product->save()){
            foreach ($images as $img){
                $image = new Image();
                $image->product_id = $product->id;
                $image->image = $img;
                $image->save();
            }
            $category_ids =$request->get('select_preferences');
            if(!empty($category_ids)){
                foreach ($category_ids as $category_id){
                    $productCategory = new \App\admin\CategoryProduct();
                    $productCategory->product_id = $product->id;
                    $productCategory->category_id =   $category_id;
                    $productCategory->save();
                }
            }

        }
        return redirect('product')->with('success', 'Information has been added successfully');

    }

    public function edit($id){
        $product = Product::find($id);
        $category= Category::select('*')->where(['pid'=>'0'])->get();
        return view('admin/product.edit',compact('product','category','id'));
    }

    public function show(){
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $name= $product->cover_image ;
        if($request->hasfile('coverImage')){
            $file = $request->file('coverImage');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $product->title = $request->get('name');
        $product->is_active = $request->get('active');
        $product->is_populer = $request->get('populer');
        $product->description = $request->get('description');
        $product->cover_image =  $name;
        if($product->save()){
            $category_ids =$request->get('select_preferences');
            if(!empty($category_ids)){
                ProductCategory::select('*')->where(['product_id' => $product->id])->delete();
                foreach ($category_ids as $category_id) {
                    $productCategory = new ProductCategory();
                    $productCategory->product_id = $product->id;
                    $productCategory->category_id = $category_id;
                    $productCategory->save();
                }
            }
            else{
                return redirect('product')->with('success', 'Information has been updated successfully');
            }
        }
        return redirect('product')->with('success', 'Information has been updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product')->with('success','Information has been  deleted');
    }
    public function search(Request $request){

        $query = Product::query()->select('product.*','cp.product_id');
        $query = $query->leftJoin('category_product AS cp', 'product.id', '=', 'cp.product_id');
        if($request->has('title')) {
            $query = $query->where('title','like','%'.$request->input('title').'%');
        }
        if($request->has('description')) {
            $query = $query->where('description','like','%'.$request->input('description').'%');
        }
        if($request->has('category')) {

            $query= $query->where('category_id',$request->category);
         }
        if($request->has('active')) {
            $query = $query->where('is_active','like','%'.$request->input('active').'%');
        }
        if($request->has('popular')) {
            $query = $query->where('is_populer','like','%'.$request->input('popular').'%');
        }

        $products = $query->get();
       // dd($products);die;
        return view('admin/product.index',compact('products'))->with('i',(\request()->input('page',1)-1)*5);
    }
}
