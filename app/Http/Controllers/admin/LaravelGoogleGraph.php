<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    function index()
    {
        $data = DB::table('users')
            ->select(
                DB::raw('is_active as gender'),
                DB::raw('count(*) as number'))
            ->groupBy('is_active')
            ->get();
        $array[] = ['Active', 'Number'];

        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->gender, $value->number];
        }
        return view('home')->with('gender', json_encode($array));
    }
}
