<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    // Index Tampilan Login
    public function indexLogin(){
        return view('login');
    }

    // Proses Pengecekan Login
    public function checkLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
            // dd($credentials)    ;    
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                // return redirect('/dashboarvb d');
                return redirect('dashboard');
            }
            else {
                return redirect('/login')->withErrors(['Email atau password salah!','email atau password salah!']);
            }
        } 
        else {
            return redirect('/login')->withErrors(['Email atau password salah!','email atau password salah!']);
        } 
    }

    public function register(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'password_confirm' => 'required'
        ]);
            if ($request->input('password') == $request->input('password_confirm')){
                User::insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'role' => 'user'
                ]);
                return redirect('/login')->withSuccess(['message','Berhasil membuat akun, silahkan login.']);
            }
            else{
                return response()->json([
                    'success' => false,
                    'data' => [
                        'message' => 'error while insert new data'
                    ],
                    'statusCode' => 400
                ]);
            }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('alert-logout','Berhasil Logout!');
    }
}
