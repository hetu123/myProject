<?php

namespace App\Http\Controllers\admin;

use App\admin\Category;
use App\admin\Image;
use App\admin\Product;
use App\admin\ProductCategory;
use App\admin\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\InstanceMockPass;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::latest()->paginate();

        return view('admin/product.index',compact('products'))->with('i',(\request()->input('page',1)-1)*5);
    }
    public function image(){
        echo 'hii';die;
    }
    public function create(){
       /* $product_id=$_GET['id'];
       $images =  Image::select('*')->where(['product_id'=>$product_id])->get();
        return view('admin/product.image',compact('images'));
        return view('admin/product.image');*/

        $category= Category::select('*')->where(['pid'=>'0'])->get();
        return view('admin/product.create',compact('category'));
      //  return view('admin/product.create');
    }


    public function store(Request $request)
    {

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
        {  // echo 'hii';die;;
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
                    // echo $category_id;
                    $productCategory = new ProductCategory();
                    $productCategory->product_id = $product->id;
                    $productCategory->category_id =   $category_id;
                    $productCategory->save();
                    // print_r($productCategory);
                    //  die;
                }
            }
            else{

            }

        //  die;
        }
        return redirect('product')->with('success', 'Information has been added successfully');
        /*$input = $request->all();


        Category::create($input);

        return redirect()->back();*/
    }

    public function edit($id)
    {
        if(isset($_GET['p_id'])){

        }
       // echo 'hii';die;
        $product = Product::find($id);
        $category= Category::select('*')->where(['pid'=>'0'])->get();
       // $img = Image::find()->where(['product_id'=>$product->id]);
      //  $img = DB::table('image')->where('product_id', $product->id)->get();
      /* foreach ($img as $i){
           echo $i->image;die;

       }*/

        return view('admin/product.edit',compact('product','category','id'));
     //   return view('admin/product.edit',compact('product',,'id'));
    }

    public function show(){

    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $name='';
        if($request->hasfile('coverImage'))
        {
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
                foreach ($category_ids as $category_id) {
                    ProductCategory::select('*')->where(['product_id' => $product->id])->delete();
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


}
