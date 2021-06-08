<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    //post
    function post(Request $request)
    {
        $transaksi = new Transaksi;
        $transaksi->nama = $request->nama;
        $transaksi->alamat = $request->alamat;
        $transaksi->merk = $request->merk;
        $transaksi->tipe = $request->tipe;
        $transaksi->plat = $request->plat;
        $transaksi->waktu = $request->waktu;
        $transaksi->harga = $request->harga;
        $transaksi->total = $request->total;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;

        $transaksi->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $transaksi
            ]
        );
    }
    //get
    function get()
    {
        $data = Transaksi::all();

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
        $data = Transaksi::where('id', $id)->get();

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
        $transaksi = Transaksi::where('id', $id)->first();
        if ($transaksi) {
            $transaksi->nama = $request->nama ? $request->nama : $transaksi->nama;
            $transaksi->alamat = $request->alamat ? $request->alamat : $transaksi->alamat;
            $transaksi->merk = $request->merk ? $request->merk : $transaksi->merk;
            $transaksi->tipe = $request->tipe ? $request->tipe : $transaksi->tipe;
            $transaksi->plat = $request->plat ? $request->plat : $transaksi->plat;
            $transaksi->waktu = $request->waktu ? $request->waktu : $transaksi->waktu;
            $transaksi->harga = $request->harga ? $request->harga : $transaksi->harga;
            $transaksi->total = $request->total ? $request->total : $transaksi->total;
            $transaksi->tgl_transaksi = $request->tgl_transaksi ? $request->tgl_transaksi : $transaksi->tgl_transaksi;

            $transaksi->save();
            return response()->json(
                [
                    "message" => " put sucess",
                    "data" => $transaksi
                ]
            );
        }
        return response()->json(
            [
                "message" => "Transaksi dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }

    //get
    function delete($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();

        if ($transaksi) {
            $transaksi->delete();
            return response()->json(
                [
                    "message" => "DELETE Transaksi  id  " . $id . " berhasil"
                ]
            );
        }
        return response()->json(
            [
                "message" => "Transaksi dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }
}
