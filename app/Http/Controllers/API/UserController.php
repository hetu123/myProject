<?php

namespace App\Http\Controllers\API;
use App\API\User;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends BaseController
{
    public function create(Request $request)
    {
        $user = new User();
        $user->username = $request->get('UserName');
        $user->first_name = $request->get('FirstName');
        $user->last_name = $request->get('LastName');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone_number = $request->get('phone_number');
        $user->is_active = $request->get('active');
        if ($user->save()) {
            $success['token'] =  $user->createToken('MyApp')->accessToken;

            $success['user'] =  $user;


            return $this->sendResponse($success, 'User register successfully.');
        }
    }
}
