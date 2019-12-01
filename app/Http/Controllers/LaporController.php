<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class LaporController extends Controller
{
    //
    public function lapor(Request $request){

        $ruang = $request->input('ruang');
        $check = Laporan::where('ruang', $ruang)->where( 'created_at', '>', Carbon::now()->subDays(2))->where('status','menunggu')->count();
        // dd($check);
        if($check <= 5){
            $photo = $request->file('gambar');
            $filename = $photo->getFilename().'.'.$photo->getClientOriginalExtension();
            Storage::disk('public')->put($filename,File::get($photo));
    
            Laporan::insert([
                'id_user' => $request->input('id_user'),
                'ruang' => $request->input('ruang'),
                'isi' => $request->input('isi'),
                'gambar' => URL::to('/storage') .'/'. $filename,
                'status' => 'menunggu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return response()->json([
                'success' => true,
                'data' => [
                    'message' => 'success add new row'
                ],
                'statusCode' => 200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'data' => [
                    'message' => 'too many request in last 2 days in same room'
                ],
                'statusCode' => 400
            ]);
        }

        
    }
    public function putdelReport($id){
        Laporan::where('id', $id)->update([
            'status' => 'ditolak',
            'updated_at' => Carbon::now(),

        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'message' => 'success reject',
            ],
            'statusCode' => 200
        ]);    }

    public function editProfile(Request $request, $id){

        $photo = $request->file('avatar');
        $filename = $photo->getFilename().'.'.$photo->getClientOriginalExtension();
        Storage::disk('public')->put($filename,File::get($photo));

        $result = User::where('id', $id)->update([
            'nis' => $request->input('nis'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'avatar' => URL::to('/storage') .'/'. $filename,
            'role' => 'user'
        ]);

        if($result){
            return response()->json([
                'success' => true,
                'data' => [
                    'message' => 'success add new row'
                ],
                'statusCode' => 200
            ]);
        }else{
            return response()->json([
                'success' => false,
                'data' => [
                    'message' => 'failed add new row'
                ],
                'statusCode' => 400
            ]);

        }
    }

    public function getReportIdUser(Request $request, $id_user){


    $result = Laporan::where('id_user', $id_user)->get();

    // return response()->json($result);
if(count($result) === 0){

    return response()->json([
        'success' => false,
        'data' => $result,
        'statusCode' => 200
    ]);

}else{

    return response()->json([
        'success' => true,
        'data' => $result,
        'statusCode' => 200
    ]);

}
    }
    public function getReportId(Request $request, $id){

        $result = Laporan::where('id', $id)->get();
    
        return response()->json([
            'success' => true,
            'data' => $result,
            'statusCode' => 200
        ]);

        }
}
