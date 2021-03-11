<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pegawai::insert([
      [
        'namaPegawai'  => 'Adi',
        'alamat' => 'Basekan',
        'noHP'  => '081357948638',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
         ],
      ]);
    }
}
