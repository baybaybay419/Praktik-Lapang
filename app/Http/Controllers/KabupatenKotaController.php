<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Http\Requests\StoreKabupatenKotaRequest;
use App\Http\Requests\UpdateKabupatenKotaRequest;

class KabupatenKotaController extends Controller
{
    public function selectedKabupatenKota($provinsiId)
    {
        $listKabupatenKota = KabupatenKota::where('provinsi_id', $provinsiId)->get();
        return response()->json($listKabupatenKota);
    }
}
