<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Pegawai;
use App\User;
use App\Golongan;
use App\Pelanggan;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for($i = 0;$i<10; $i++){
            $pegawai = Pegawai::create([
                'namaPegawai'=>'Pegawai'.$i,
                'alamat'=>'Alamat pegawai'.$i,
                'noHp'=>'0898675563'.$i
            ]);

            $user = User::create([
                'pegawai_id'=>$pegawai->idPegawai,
                'password'=>Hash::make('12345678'),
                'username'=>'User'.$i,
                'name'=>'Nama User'.$i,
            ]);

            $golongan = Golongan::create([
                'kode'=>'B123'.$i,
                'namaGolongan'=>'golongan'.$i,
                'tarif'=>2000,
            ]);

            $pelanggan = Pelanggan::create([
                'golongan_id'=>$golongan->idGolongan,
                'namaPelanggan'=>'pelanggan'.$i,
                'alamat'=>'alamat'.$i,
                'noHp'=>'0898862656'.$i,
                'tanggalPasang'=>Carbon::now(),
                'kodeMeter'=>'1212',
            ]);
        }

    }
}
