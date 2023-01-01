<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;

class ProvinsiController extends Controller
{
    public function selectedProvinsi()
    {
        $listProvinsi = Provinsi::all();
        return response()->json($listProvinsi);
    }
}
