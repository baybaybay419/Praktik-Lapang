<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    public function kabupatenKotas()
    {
        return $this->hasMany(KabupatenKota::class, 'kabupaten_kota_id');
    }
}