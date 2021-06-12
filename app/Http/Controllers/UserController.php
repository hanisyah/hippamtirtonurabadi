<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pegawai;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $pegawai = Pegawai::all();
        return view ('user.index', compact('user','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('user.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'pegawai_id' => $request->idPegawai,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/user')->with(['success' => 'Data User Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('pegawai')->find($id);

        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
                // validasi
                'pegawai_id'=>'required',
                'name'=>'required',
                'username'=>'required',
            ],[
                // pesan error ditampilkan saat validasi gagal
            'pegawai_id.required'=>'Harap pilih pegawai',
            'name.required'=>'Harap masukkann nama',
            'username.required'=>'Harap masukkan username',
            ]);

        // mengembalikan pesan error ke halaman
        if($validator->fails()){
            return redirect()->back()->with(['error'=>$validator->errors()->first()]);
        }

        //cek apakah di request nya ada passsowrd nya dan passwordnya tidak kosong , apabilsa konsisi terpenuhi maka jalankan script
        if(!empty($request->password)){
            User::where('id', $id)
            ->update([
                'pegawai_id' => $request->pegawai_id,
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
        }else{
            User::where('id', $id)
            ->update([
                'pegawai_id' => $request->pegawai_id,
                'name' => $request->name,
                'username' => $request->username,
            ]);
        }
        return redirect('/user')->with(['success' => 'Data User Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with(['success' => 'Data User Berhasil Dihapus!']);
    }
}
