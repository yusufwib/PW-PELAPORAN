<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\User;

class MaatwebsiteController extends Controller
{
    //
    public function import(Request $request)
    {
        if($request->hasFile('import_file')){
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['nis'] = $row['nis'];
                    $data['name'] = $row['name'];
                    $data['email'] = $row['email'];
                    $data['password'] = $row['password'];

                    if(!empty($data)) {
                        // DB::table('users')->insert($data);
                        User::insert($data);
                    }
                }
            });
        }

        // Session::put('success', 'Youe file successfully import in database!!!');
        

        return back();
    }
}
