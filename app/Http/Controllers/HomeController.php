<?php

namespace App\Http\Controllers;

use App\admin\User;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $data = DB::table('users')
            ->select(
                DB::raw('is_active as active'),
                DB::raw('count(*) as number'))
            ->groupBy('is_active')
            ->get();

        $array[] = ['Active', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->active, $value->number];
        }
        return view('home')->with('active', json_encode($array));*/


        $data = DB::table('users')
            ->select(
                DB::raw('is_active as active'),
                DB::raw('count(*) as number'))
            ->groupBy('is_active')
            ->get();
        //dd($data);die;
        $array[] = ['Active', 'Number'];
        foreach($data as $key => $value)
        {
            if($value->active==1){
                $array[++$key] = ['YES', $value->number];
            }
            else{
                $array[++$key] = ['NO', $value->number];
            }

        }

        $user = DB::table('users')->where('is_active','1')->count();

        return view('home')->with('active', json_encode($array));

    }
}
