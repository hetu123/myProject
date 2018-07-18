<?php

namespace App\Http\Controllers\API;
use App\API\User;
use App\API\UserFavourite;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends BaseController
{
    public function signup(Request $request){
        $username = $request->username;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $password = $request->password;
        $phone_number = $request->phone_number;
        $user = new User();

        $user->username = $username;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password =Hash::make($password);
        $user->phone_number=$phone_number;
        if($user->save()){
            $success['user'] =  $user;
            return $this->sendResponse($success, 'User register successfully.');
        }

    }

    public function userFavourite(Request $request){
        $user_id= $request->user_id;
        $product_id= $request->product_id;
        $user_favourite = DB::table('user_favourite')->where('user_id', $user_id)->where('product_id',$product_id)->get();

        if ( $user_favourite->isEmpty() ) {
            $user_favourite = new UserFavourite();
            $user_favourite->user_id = $user_id;
            $user_favourite->product_id = $product_id;
            $user_favourite->save();
            $success['user'] = $user_favourite;
            return $this->sendResponse($success, 'successfully favourite product');
        }
        else{
            DB::table('user_favourite')->where('user_id', $user_id)->where('product_id',$product_id)->delete();
            return response(['error' => 'Successfully unfavourite product'], 404);
        }
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
    }
}
