<?php

namespace App\Http\Controllers;

use App\Models\main;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function checkAmbilBarang(Request $req)
    {
        $_data = main::where("kode_pengambilan", $req->id)->get();
        if (!$_data->isEmpty()) {
            $success = true;
            $data = $_data->first();
        } else {
            $success = false;
            $data = [];
        }
        return response()->json(["success" => $success, "data" => $data]);
    }

    public function ambilBarang(Request $req)
    {
        $_data = main::where("kode_pengambilan", $req->id)->update([
            "is_take" => 1,
            "nama_pengambil" => $req->nama_pengambil,
            "take_date" =>  \Carbon\Carbon::now()->toDateTimeString()
        ]);
        return response()->json(["success" => $_data]);
    }
}
