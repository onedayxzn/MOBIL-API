<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;

class AkunController extends Controller
{
    //post
    function post(Request $request)
    {
        $akun = new Akun;
        $akun->nama = $request->nama;
        $akun->email = $request->email;
        $akun->password = $request->password;
        $akun->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $akun
            ]
        );
    }
    //get
    function get()
    {
        $data = Akun::all();

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
        $data = Akun::where('id', $id)->get();

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
        $akun = Akun::where('id', $id)->first();
        if ($akun) {
            $akun->nama = $request->nama ? $request->nama : $akun->nama;
            $akun->email = $request->email ? $request->email : $akun->email;
            $akun->password = $request->password ? $request->password : $akun->password;
            $akun->save();
            return response()->json(
                [
                    "message" => " put sucess",
                    "data" => $akun
                ]
            );
        }
        return response()->json(
            [
                "message" => "User dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }

    //get
    function delete($id)
    {
        $akun = Akun::where('id', $id)->first();

        if ($akun) {
            $akun->delete();
            return response()->json(
                [
                    "message" => "DELETE User  id  " . $id . " berhasil"
                ]
            );
        }
        return response()->json(
            [
                "message" => "User dengan id " . $id . " tidak di temukan"
            ],
            400
        );
    }
}
