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
    public function index(){
        $users = User::latest()->paginate();
        return view('admin/User.index',compact('users'))->with('i',(\request()->input('page',1)-1)*5);
    }

    public function create(){
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

    public function edit($id){
        $user = User::find($id);
        return view('admin/User.edit',compact('user','id'));
    }

    public function update(Request $request, $id){
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

    protected function validator(array $data){
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function getImport(){
        return view('import');
    }

    public function parseImport(CsvImportRequest $request){
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 0, 2);
        return view('import_fields', compact('csv_data'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success','Information has been  deleted');
    }

    public function search(Request $request){
//      /  echo $request->username;die;

        $query = User::query()->select('users.*');
        if($request->has('username')) {
            $query = $query->where('username','like','%'.$request->input('username').'%');
        }
        if($request->has('first_name')) {
            $query = $query->where('first_name','like','%'.$request->input('first_name').'%');
        }
        if($request->has('last_name')) {
            $query = $query->where('last_name','like','%'.$request->input('last_name').'%');
        }
        if($request->has('email')) {
            $query = $query->where('email','like','%'.$request->input('email').'%');
        }
        if($request->has('phone_number')) {
            $query = $query->where('phone_number','like','%'.$request->input('phone_number').'%');
        }
        if($request->has('active')) {
            $query = $query->where('is_active','like','%'.$request->input('active').'%');
        }
       /* if($request->has('verified')) {
            $query = $query->where('verified','like','%'.$request->input('verified').'%');
        }*/
        $users = $query->get();
        // dd($products);die;
        return view('admin/User.index',compact('users'))->with('i',(\request()->input('page',1)-1)*5);
    }
}
