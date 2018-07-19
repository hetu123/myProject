<?php

namespace App\Http\Controllers\API;

use App\admin\deals;
use App\API\Category;
use App\API\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\DB;

class APIController extends BaseController
{
    public function categoryList(){
        $category = DB::table('category')->where('pid', '0')->where('is_active','1')->get();
        if ( $category->isEmpty() ) {
            return response(['error' => 'Record not found'], 404);
        }
        $success['category'] =  $category;

        return $this->sendResponse($success, 'Category List send successfully.');
    }

    public function subCategoryList(){
        $category = DB::table('category')->where('pid','<>', '0')->where('is_active','1')->get();
       // print_r($category);die;
        if ( $category->isEmpty() ) {
            return response(['error' => 'Record not found'], 404);
        }
        $success['category'] =  $category;

        return $this->sendResponse($success, 'Sub-Category List send successfully.');
    }

    public function categoryDetail(Request $request){
        $category_id = $request->category_id;
       // $category = Category::find('id',$category_id);
        $category = Category::with('products')->with('products.images')->with('products.deals')->where('id',$category_id)->get();
        if ( $category->isEmpty() ) {
            return response(['error' => 'Record not found'], 404);
        }
        $success['category-detail'] =  $category;

        return $this->sendResponse($success, 'Category Detail send successfully.');
    }

    public function productDetail(Request $request){
        $product_id = $request->product_id;
        // $category = Category::find('id',$category_id);

        $product = Product::with('images')->with('deals')->where('id',$product_id)->get();
        if ( $product->isEmpty() ) {
            return response(['error' => 'Record not found'], 404);
        }
        $success['product-detail'] =  $product;

        return $this->sendResponse($success, 'Product Detail send successfully.');
    }

    public function dealDetail(Request $request){
        $deal_id = $request->deal_id;
        // $category = Category::find('id',$category_id);

        $product = \App\API\Deals::with('products')->with('products.images')->where('id',$deal_id)->get();
        if ( $product->isEmpty() ) {
            return response(['error' => 'Record not found'], 404);
        }
        $success['product-detail'] =  $product;

        return $this->sendResponse($success, 'Product Detail send successfully.');
    }

}
