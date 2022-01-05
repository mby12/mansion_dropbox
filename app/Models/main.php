<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    protected $fillable = [
        "unit",
        "nama_pengirim",
        "nama_penerima",
        "no_resi",
        "nama_logistik",
        "no_loker",
        "kode_pengambilan",
    ];
}
