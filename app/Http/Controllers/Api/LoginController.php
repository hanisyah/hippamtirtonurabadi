<?php

namespace App\Http\Controllers\Api;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $requset){
        // return "User Controller Login";
        // dd($requset->all());die();
        $user = User::where('username', $requset->username)->first();

        if($user){
            if(password_verify($requset->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Username tidak terdaftar');
    }

    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
