<?php

namespace App\Http\Controllers\Api;
use App\User;
use App\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $user = User::join('pegawai', 'pegawai.idPegawai', '=', 'users.pegawai_id')->where('kodePegawai', $request->kodePegawai)->first();

        if($user){
            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->username,
                    'username' => $user->username,
                    'pegawai_id' => $user->pegawai_id,
                    'kodePegawai' => $user->kodePegawai,
                    'namaPegawai' => $user->namaPegawai
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
