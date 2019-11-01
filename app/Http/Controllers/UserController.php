<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function checkLogin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'user') {
                return response()->json([
                    'success' => true,
                    'data' => User::where('email', $request->input('email'))->get(),
                    'statusCode' => 200

                ]);
            }
            else if (Auth::user()->role == 'admin') {
                return response()->json([
                    'success' => true,
                    'data' => 
                        User::where('email', $request->input('email'))->get()
                    ,
                    'statusCode' => 200

                ]);
            } 
        } 
        else {
            return response()->json([
                'success' => false,
                'message' => 'email atau password salah!'
            ]);
        }
    }

    public function getUser($id_user){

        $result = User::where('id', $id_user)->get();
        return response()->json([
            'success' => true,
            'data' => $result,
            'statusCode' => 200
        ]);


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
                return response()->json([
                    'success' => true,
                    'data' => [
                        'message' => 'success add new row'
                    ],
                    'statusCode' => 200
                ]);

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
}
