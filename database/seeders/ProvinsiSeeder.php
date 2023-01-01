<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provinsi::create([
            'provinsi' => 'Aceh',
            'status' => 'Belum'
        ]);

        Provinsi::create([
            'provinsi' => 'Sumatera Utara',
            'status' => 'Belum'
        ]);

        Provinsi::create([
            'provinsi' => 'Sumatera Barat',
            'status' => 'Belum'
        ]);

        Provinsi::create([
            'provinsi' => 'Sumatera Selatan',
            'status' => 'Belum'
        ]);
    }
}
