<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KabupatenKota::create([
            'provinsi_id' => 1,
            'kabupaten_kota' => 'Kabupaten Aceh Barat',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 1,
            'kabupaten_kota' => 'Kabupaten Aceh Barat Daya',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 1,
            'kabupaten_kota' => 'Kabupaten Aceh Besar',
            'status' => 'Belum'
        ]);



        KabupatenKota::create([
            'provinsi_id' => 2,
            'kabupaten_kota' => 'Kabupaten Asahan',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 2,
            'kabupaten_kota' => 'Kabupaten Batu Bara',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 2,
            'kabupaten_kota' => 'Kabupaten Dairi',
            'status' => 'Belum'
        ]);



        KabupatenKota::create([
            'provinsi_id' => 3,
            'kabupaten_kota' => 'Kabupaten Agam',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 3,
            'kabupaten_kota' => 'Kabupaten Dharmasraya',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 3,
            'kabupaten_kota' => 'Kabupaten Kepulauan Mentawai',
            'status' => 'Belum'
        ]);



        KabupatenKota::create([
            'provinsi_id' => 4,
            'kabupaten_kota' => 'Kabupaten Banyuasin',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 4,
            'kabupaten_kota' => 'Kabupaten Empat Lawang',
            'status' => 'Belum'
        ]);

        KabupatenKota::create([
            'provinsi_id' => 4,
            'kabupaten_kota' => 'Kabupaten Lahat',
            'status' => 'Belum'
        ]);
    }
}
