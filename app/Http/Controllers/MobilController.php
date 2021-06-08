<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class MobilController extends Controller
{
    //post
    function post(Request $request)
    {
        $mobil = new Mobil;
        $mobil->merk = $request->merk;
        $mobil->tipe = $request->tipe;
        $mobil->transmisi = $request->transmisi;
        $mobil->tahun = $request->tahun;
        $mobil->plat = $request->plat;
        $mobil->harga = $request->harga;
        $mobil->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $mobil
            ]
        );
    }
    //get
    function get()
    {
        $data = Mobil::all();

        return response()->json(
            [
                "message" => "sucess",
                "data" => $data
            ]
        );
    }
    //getbyid
    function getById($id)
    {
        $data = Mobil::where('id', $id)->get();

        return response()->json(
            [
                "message" => "sucess",
                "data" => $data
            ]
        );
    }

    //put
    function put($id, Request $request)
    {
        $mobil = Mobil::where('id', $id)->first();
        if ($mobil) {
            $mobil->merk = $request->merk ? $request->merk : $mobil->merk;
            $mobil->tipe = $request->tipe ? $request->tipe : $mobil->tipe;
            $mobil->transmisi = $request->transmisi ? $request->transmisi : $mobil->transmisi;
            $mobil->tahun = $request->tahun ? $request->tahun : $mobil->tahun;
            $mobil->plat = $request->plat ? $request->plat : $mobil->plat;
            $mobil->harga = $request->harga ? $request->harga : $mobil->harga;
            $mobil->save();
            return response()->json(
                [
                    "message" => " put sucess",
                    "data" => $mobil
                ]
            );
        }
        return response()->json(
            [
                "message" => "mobil dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }

    //get
    function delete($id)
    {
        $mobil = Mobil::where('id', $id)->first();

        if ($mobil) {
            $mobil->delete();
            return response()->json(
                [
                    "message" => "DELETE mobil  id  " . $id . " berhasil"
                ]
            );
        }
        return response()->json(
            [
                "message" => "mobil dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }
}
