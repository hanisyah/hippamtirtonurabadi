<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\DB;
use App\User;

class ForgotpasswordController extends Controller
{
    public function forgotpassword(Request $request)
    {
        try{
            $email = DB::table('users')
                ->select('pegawai.email')
                ->join('pegawai', 'pegawai.idPegawai', '=', 'users.pegawai_id')
                ->where('kodePegawai', $request->kodePegawai)
                ->get();

            $password = DB::table('users')
                ->select('users.password')
                ->join('pegawai', 'pegawai.idPegawai', '=', 'users.pegawai_id')
                ->where('kodePegawai', $request->kodePegawai)
                ->get();

            // return response()->json([$password]);

            $kirim = Mail::to($email)->send(new SendMail($password));
            if($kirim) {
                echo "Email telah dikirim";
            }
        }catch(\Exception $e){
            \Log::error($e);
        }
    }
}
