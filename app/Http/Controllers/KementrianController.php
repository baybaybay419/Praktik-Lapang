<?php

namespace App\Http\Controllers;

use App\Models\Kementrian;
use App\Http\Requests\StoreKementrianRequest;
use App\Http\Requests\UpdateKementrianRequest;

class KementrianController extends Controller
{
    public function selectedKementrian()
    {
        $listProvinsi = Kementrian::all();
        return response()->json($listProvinsi);
    }
}
