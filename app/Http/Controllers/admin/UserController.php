<?php

namespace App\Http\Controllers\admin;

use App\admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail;

use App\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\VerifyMail;
class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate();


        return view('admin/User.index',compact('users'))->with('i',(\request()->input('page',1)-1)*5);
    }
    public function create(){

      //  $parent= User::select('*')->where(['pid'=>0])->get();
      //  return view('admin/category.create',compact('parent'));
        return view('admin/User.create');
    }
    public function store(Request $request){
        $user = new User();
        $user->username = $request->get('UserName');
        $user->first_name = $request->get('FirstName');
        $user->last_name = $request->get('LastName');
        $user->email = $request->get('email');
        $user->password =  Hash::make($request->get('password'));
        $user->phone_number = $request->get('phone_number');
        $user->is_active = $request->get('active');
        if($user->save()){
            return redirect('admin/User.index')->with('success', 'Information has been added successfully');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/User.edit',compact('user','id'));
    }
    public function update(Request $request, $id)
    {
        $user = \App\admin\User::find($id);
        $user->username = $request->get('UserName');
        $user->first_name = $request->get('FirstName');
        $user->last_name = $request->get('LastName');
        $user->email = $request->get('email');
        $user->phone_number = $request->get('phone_number');
        $user->is_active = $request->get('active');
        $user->save();
        return redirect('user')->with('success', 'Information has been updated successfully');
    }
    protected function validator(array $data)
    {   //echo 'hii';
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
