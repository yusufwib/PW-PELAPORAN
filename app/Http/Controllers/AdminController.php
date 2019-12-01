<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\User;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    //

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            // 'password_confirm' => 'required'
        ]);
            if ($request->input('password') != null){
                User::insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'nis' => $request->input('nis'),
                    'password' => $request->input('password'),
                    'avatar' => $request->input('avatar'),

                    // 'role' => 'user'
                ]);
                return redirect('/form')->withSuccess(['message','Berhasil membuat akun']);
            }
            else{
                return redirect('/adduser')->withError(['message','Gagal membuat akun atau email sudah ada']);
            }

    }

    public function getGrafik(){
        $req = Laporan::where('status', 'menunggu')->count();
        $proses = Laporan::where('status', 'proses')->count();
        $finish = Laporan::where('status', 'selesai')->count();
        $all = Laporan::count();

        $result = [
            'req' => $req,
            'proses' => $proses,
            'finish' => $finish,
            'all' => $all
        ];
return response()->json($result);
        // return view('dashboard',['result'=>$result]);
    }

//     public function getGrafik(){
//         $req = Laporan::where('status', 'req')->count();
//         $proses = Laporan::where('status', 'proses')->count();
//         $finish = Laporan::where('status', 'finish')->count();

//         $result = [
//             'req' => $req,
//             'proses' => $proses,
//             'finish' => $finish
//         ];
// return response()->json($result);
//         // return view('dashboard',['result'=>$result]);
//     }
    public function getData(){
        $result = Laporan::
        join('users', 'users.id', '=', 'laporans.id_user')
                            ->select('laporans.id','gambar','ruang','isi', 'users.nis', 'users.name','status','laporans.updated_at', 'laporans.created_at')
                            ->get();
                            // return response()->json($result);
        return view('accordion',['result'=>$result]);
    }
    public function putProses($id){
        Laporan::where('id', $id)->update([
            'status' => 'proses',
            'updated_at' => Carbon::now(),

        ]);

        return redirect('accordion');
    }
    public function edit(Request $request){
        User::where('id', $request->input('id'))->update([
            'nis' => $request->input('nis'),
            'email' => $request->input('email'),
            'name' => $request->input('name')
        ]);

        return redirect('form');
    }
    public function putFinish($id){
        Laporan::where('id', $id)->update([
            'status' => 'selesai',
            'updated_at' => Carbon::now(),

        ]);

        return redirect('accordion');
    }
    public function delReport($id){
        Laporan::where('id', $id)->delete();

        return redirect('accordion');
    }
    public function putdelReport($id){
        Laporan::where('id', $id)->update([
            'status' => 'ditolak',
            'updated_at' => Carbon::now(),

        ]);

        return redirect('accordion');
    }
//     public function getGrafik(){
//         $date = Carbon::now(); //  DateTime string will be 2014-04-03 13:57:34

// $date->subWeek(); // or $date->subDays(7),  2014-03-27 13:58:25

//         $result = Laporan::where('created_at', '>', $date->toDateTimeString() )
//         ->get();

//         return response()->json($result);
//     }

    public function table(){
        return Datatables::of(User::query())->make(true);
    }
    public function getChart(){
        $one = Laporan::whereDate('created_at', Carbon::now()->subDays(0))
        ->count();
        $dayOne = Carbon::now()->subDays(0)->format('l');

        $two = Laporan::whereDate('created_at', Carbon::now()->subDays(1))
        ->count();
        $dayTwo = Carbon::now()->subDays(1)->format('l');

        $three = Laporan::whereDate('created_at', Carbon::now()->subDays(2))
        ->count();
        $dayThree = Carbon::now()->subDays(2)->format('l');

        $four = Laporan::whereDate('created_at', Carbon::now()->subDays(3))
        ->count();
        $dayFour = Carbon::now()->subDays(3)->format('l');

        $five = Laporan::whereDate('created_at', Carbon::now()->subDays(4))
        ->count();
        $dayFive = Carbon::now()->subDays(4)->format('l');

        $six = Laporan::whereDate('created_at', Carbon::now()->subDays(5))
        ->count();
        $daySix = Carbon::now()->subDays(5)->format('l');

        $seven = Laporan::whereDate('created_at', Carbon::now()->subDays(6))
        ->count();
        $daySeven = Carbon::now()->subDays(6)->format('l');

        $result =[
            $dayOne => [$one,$dayOne],
            $dayTwo => [$two,$dayTwo],
            $dayThree => [$three, $dayThree],
            $dayFour => [$four, $dayFour],
            $dayFive => [$five, $dayFive],
            $daySix => [$six, $daySix],
            $daySeven => [$seven, $daySeven]
        ];


        return response()->json($result);
    }
    public function deleteUser($id){

        User::where('id', $id)->delete();

        return redirect('form');
        
    }
}
