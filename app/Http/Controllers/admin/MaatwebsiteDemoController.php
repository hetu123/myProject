<?php
namespace App\Http\Controllers\admin;


use App\admin\User;
use Illuminate\Http\Request;

use App\Item;
use Illuminate\Support\Facades\Hash;
use Excel;

use App\Http\Controllers\Controller;
class MaatwebsiteDemoController extends Controller

{

    public function importExport(){
        return view('admin/importExport');
    }

    public function downloadExcel(Request $request, $type){
         $data = User::get()->toArray();
         return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request){
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            if(!empty($data) && $data->count()){
                 foreach ($data->toArray() as $key => $value) {
                        if(!empty($value['username'])){
                            $insert[] = [
                                'username' => $value['username'],
                                'first_name' => $value['first_name'],
                                'last_name'=>$value['last_name'],
                                'email'=>$value['email'],
                                'password'=>Hash::make($request->get($value['password'])),
                                'phone_number'=>$value['phone_number'],
                                'is_active'=>$value['is_active'],
                                'verified'=>$value['verified']
                            ];
                        }
                 }
                 if(!empty($insert)){
                    User::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }
            }
        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
?>
