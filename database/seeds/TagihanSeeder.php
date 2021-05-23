<?php

use App\DetailTagihan;
use Illuminate\Database\Seeder;
use App\Tagihan;
use Carbon\Carbon;
class TagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 100;$i++){
            Tagihan::create([
                'pelanggan_id'=>mt_rand(1,3),
                'pegawai_id'=>1,
                'golongan_id'=>1,
                'tanggalCatat'=>Carbon::now(),
                'tahun'=>'2021',
                'bulan'=>'April',
                'jumlahMeter'=>'1232',
                'fotoMeteran'=>'1621735409835.png'
            ]);
        }

    }
}
