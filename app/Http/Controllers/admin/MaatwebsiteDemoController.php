<?php
namespace App\Http\Controllers\admin;


use App\admin\User;
use Illuminate\Http\Request;

use App\Item;

use Excel;

use App\Http\Controllers\Controller;
class MaatwebsiteDemoController extends Controller

{


    /**

     * Return View file

     *

     * @var array

     */

    public function importExport()

    {

        return view('admin/importExport');

    }


    /**

     * File Export Code

     *

     * @var array

     */

    public function downloadExcel(Request $request, $type)

    {

        $data = User::get()->toArray();
       // print_r($data);die;
        
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }


    /**

     * Import file into database Code

     *

     * @var array

     */

    public function importExcel(Request $request)

    {


        if($request->hasFile('import_file')){

            $path = $request->file('import_file')->getRealPath();


            $data = Excel::load($path, function($reader) {})->get();

           // print_r($data);die;
            if(!empty($data) && $data->count()){


                foreach ($data->toArray() as $key => $value) {

                    if(!empty($value)){
                      // print_r($value['title']);die;
                        //foreach ($value as $v) {
                          //  print_r($v['title']);die;
                            $insert[] = ['title' => $value['title'], 'description' => $value['description']];

                        //}

                    }

                }




                if(!empty($insert)){

                    Item::insert($insert);

                    return back()->with('success','Insert Record successfully.');

                }


            }


        }


        return back()->with('error','Please Check your file, Something is wrong there.');

    }


}
?>
