<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Support\Facades\URL;

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
                    $data['password'] = bcrypt($row['password']);
                    $data['avatar'] = "http://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/logo-telkom-schools.png";
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
