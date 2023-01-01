<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\Kementrian;
use Illuminate\Http\Request;
use App\Models\KabupatenKota;

class AdminController extends Controller
{
    public function statistik()
    {
        $title = 'statistik';
        $param = false;

        $jumlahKabuptenKota = KabupatenKota::all();
        $jumlahProvinsi = Provinsi::all();
        $jumlahKementrian = Kementrian::all();
        $sudahKabupatenKota = KabupatenKota::where('status', 'Sudah')->get();
        $sudahProvinsi = Provinsi::where('status', 'Sudah')->get();
        $sudahKementrian = Kementrian::where('status', 'Sudah')->get();
        $belumKabupatenKota = KabupatenKota::where('status', 'Belum')->get();
        $belumProvinsi = Provinsi::where('status', 'Belum')->get();
        $belumKementrian = Kementrian::where('status', 'Belum')->get();



        $countSudahKabupatenKota = $sudahKabupatenKota->count();
        $countSudahProvinsi = $sudahProvinsi->count();
        $countSudahKementrian = $sudahKementrian->count();
        $countBelumKabupatenKota = $belumKabupatenKota->count();
        $countBelumProvinsi = $belumProvinsi->count();
        $countBelumKementrian = $belumKementrian->count();





        return view('statistik', compact(
            'title',
            'sudahKabupatenKota',
            'sudahProvinsi',
            'sudahKementrian',
            'belumKabupatenKota',
            'belumProvinsi',
            'belumKementrian',
            'countSudahKabupatenKota',
            'countSudahProvinsi',
            'countSudahKementrian',
            'countBelumKabupatenKota',
            'countBelumProvinsi',
            'countBelumKementrian',
            'param'
        ));
    }

    public function getStatistik($param)
    {
        $title = 'statistik';

        $jumlahKabuptenKota = KabupatenKota::all();
        $jumlahProvinsi = Provinsi::all();
        $jumlahKementrian = Kementrian::all();
        $sudahKabupatenKota = KabupatenKota::where('status', 'Sudah')->get();
        $sudahProvinsi = Provinsi::where('status', 'Sudah')->get();
        $sudahKementrian = Kementrian::where('status', 'Sudah')->get();
        $belumKabupatenKota = KabupatenKota::where('status', 'Belum')->get();
        $belumProvinsi = Provinsi::where('status', 'Belum')->get();
        $belumKementrian = Kementrian::where('status', 'Belum')->get();

        $countSudahKabupatenKota = $sudahKabupatenKota->count();
        $countSudahProvinsi = $sudahProvinsi->count();
        $countSudahKementrian = $sudahKementrian->count();
        $countBelumKabupatenKota = $belumKabupatenKota->count();
        $countBelumProvinsi = $belumProvinsi->count();
        $countBelumKementrian = $belumKementrian->count();






        return view('statistik', compact(
            'title',
            'sudahKabupatenKota',
            'sudahProvinsi',
            'sudahKementrian',
            'belumKabupatenKota',
            'belumProvinsi',
            'belumKementrian',
            'countSudahKabupatenKota',
            'countSudahProvinsi',
            'countSudahKementrian',
            'countBelumKabupatenKota',
            'countBelumProvinsi',
            'countBelumKementrian',
            'param'
        ));
    }
}
