<?php

namespace App\Http\Controllers\Api;
use App\User;
use App\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $requset){
        // return "User Controller Login";
        // dd($requset->all());die();
        $user = User::where('username', $requset->username)->first();
        $namaPegawai = Pegawai::where('idPegawai', $user['pegawai_id'])->first();
        $user['namaPegawai'] = $namaPegawai->namaPegawai;

        if($user){
            if(password_verify($requset->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->name,
                    'user' => $user->username,
                    'pegawai_id' => $user->pegawai_id,
                    'namaPegawai' => $user['namaPegawai']
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
