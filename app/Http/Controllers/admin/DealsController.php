<?php

namespace App\Http\Controllers\admin;

use App\admin\deals;
use App\admin\Product;
use App\admin\ProductDeal;
use App\API\DealProduct;
use App\API\DealsProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
    public function index(){
        $deals = deals::latest()->paginate();
        return view('admin/deals.index',compact('deals'))->with('i',(\request()->input('page',1)-1)*5);
    }
    public function create(){
        $products= Product::all();
        return view('admin/deals.create',compact('products'));
    }
    public function store(Request $request){
        $deal = new deals();
        $deal->title = $request->get('Title');
        $deal->description =$request->get('Description');
        $deal->short_description = $request->get('short_Description');
        $deal->is_active = $request->get('active');
        $deal->is_populer = $request->get('populer');
        $deal->save();
        $products =$request->get('select_preferences');
        if(!empty($products)) {
            foreach ($products as $product) {
                if($deal->save()){
                    $product_deal = new DealsProduct();
                    $product_deal->product_id = $product;
                    $product_deal->deals_id = $deal->id;
                    $product_deal->save();
                }
            }
        }
        return redirect('deals')->with('success', 'Information has been added successfully');
    }
    public function edit($id){
        $deal  = deals::find($id);
        $products= Product::all();

        return view('admin/deals.edit',compact('products','deal','id'));
    }
    public function show(){}
    public function update(Request $request, $id){
        $deal = deals::find($id);
        $deal->title = $request->get('Title');
        $deal->description =$request->get('Description');
        $deal->short_description = $request->get('short_Description');
        $deal->is_active = $request->get('active');
        $deal->is_populer = $request->get('populer');
        $deal->save();
        $products =$request->get('select_preferences');
        if(!empty($products)) {
            ProductDeal::select('*')->where(['deal_id' => $deal->id])->delete();
            foreach ($products as $product) {
                if($deal->save()){
                    $product_deal = new DealProduct();
                    $product_deal->product_id = $product;
                    $product_deal->deal_id = $deal->id;
                    $product_deal->save();
                }
            }
        }
        return redirect('deals')->with('success', 'Information has been updated successfully');
    }
    public function destroy($id){
        $deal = deals::find($id);
        $deal->delete();
        return redirect('deals')->with('success','Information has been  deleted');
    }
    public function hello(){
        echo 'hii';
    }
}

