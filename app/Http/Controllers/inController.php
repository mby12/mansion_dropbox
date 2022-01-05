<?php

namespace App\Http\Controllers;

use App\Models\main;
use App\tbresidential;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class inController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = tbresidential::select("room_no")->distinct()->get();
        // return response()->json($_units);
        return view("item.in", compact("units"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        try {
            main::create([
                "unit" => $request->unit,
                "nama_pengirim" => $request->pengirim,
                "nama_penerima" => $request->penerima,
                "no_resi" => $request->no_resi,
                "nama_logistik" => $request->nama_logistik,
                "no_loker" => $request->loker,
                "kode_pengambilan" => Str::random(5)
            ]);
            return redirect()->route("in.index")->with("inputted", "Berhasil menambahkan item");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
