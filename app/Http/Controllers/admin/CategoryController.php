<?php

namespace App\Http\Controllers\admin;

use App\admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function index(){
        $category = Category::latest()->paginate();
        return view('admin/category.index',compact('category'))->with('i',(\request()->input('page',1)-1)*5);
    }

    public function create(){
        $parent= Category::select('*')->where(['pid'=>0])->get();
        return view('admin/category.create',compact('parent'));
    }

    public function store(Request $request){
        $name='';
        if($request->hasfile('Imageicon'))
        {
            $file = $request->file('Imageicon');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $category_ids =$request->get('select_preferences');
        if(!empty($category_ids)) {
            foreach ($category_ids as $category_id) {
                $category = new Category();
                $category->name = $request->get('Name');
                $category->is_active = $request->get('active');
                $category->pid = $category_id;
                $category->is_populer = $request->get('populer');
                $category->description = $request->get('Description');
                $category->image_icon = $name;
                $category->save();
            }
        }
        else{
            $category = new Category();
            $category->name = $request->get('Name');
            $category->is_active = $request->get('active');
            $category->pid = '0';
            $category->is_populer = $request->get('populer');
            $category->description = $request->get('Description');
            $category->image_icon = $name;
            $category->save();
        }
        return redirect('addcategory')->with('success', 'Information has been added successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin/category.edit',compact('category','id'));
    }

    public function show(){
    }

    public function update(Request $request, $id){
        $category = \App\admin\Category::find($id);
        if($request->hasfile('Imageicon')) {
            $file = $request->file('Imageicon');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $category->image_icon = $name;
        }
        $category->name = $request->get('name');
        $category->is_active = $request->get('active');
        $category->is_populer = $request->get('populer');
        $category->description = $request->get('Description');
        $category_ids =$request->get('select_preferences');
        if(!empty($category_ids)){
            foreach ($category_ids as $category_id) {
            }
        }
        $category->save();
        return redirect('addcategory')->with('success', 'Information has been updated successfully');

    }

    public function destroy($id){
        $passport = Category::find($id);
        $passport->delete();
        return redirect('addcategory')->with('success','Information has been  deleted');
    }
    public function search(Request $request){
     // echo $request->input('name');die;
        $query = Category::query();


        if($request->has('name')) {
            $query = $query->where('name','like','%'.$request->input('name').'%');
        }
        if($request->has('description')) {
            $query = $query->where('description','like','%'.$request->input('description').'%');
        }
        if($request->has('pid')) {
            $query = $query->where('pid',$request->pid);
        }
        if($request->has('active')) {
            $query = $query->where('is_active','like','%'.$request->input('active').'%');
        }
        if($request->has('popular')) {
            $query = $query->where('is_populer','like','%'.$request->input('popular').'%');
        }
      //  echo $query->toSql();die;
        $category = $query->get();
       /*dd($category);die;*/
        return view('admin/category.index',compact('category'))->with('i',(\request()->input('page',1)-1)*5);
    }
}
