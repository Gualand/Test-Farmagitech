<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{

    public function index()
    {
        $barang = Barang::orderBy('id', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'barang' => $barang
        ], 200);
    }

    public function store(Request $request)
    {
        $validate = [
            'nama' => 'required',
            'harga' => 'required',
        ];

        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukan data',
                'barang' => $validator->errors()
            ]);
        }

        $dataBarang = new Barang;
        $dataBarang->nama = $request->nama;
        $dataBarang->harga = $request->harga;
        $dataBarang->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukan data barang',
        ]);
    }


    public function show(string $id)
    {
        $barang = Barang::find($id);

        if($barang){
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'barang' => $barang 
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Barang tidak ditemukan'
            ]);
        }
    }


    public function update(Request $request, string $id)
    {
        $dataBarang = Barang::find($id);

        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        $validate = [
            'nama' => 'required',
            'harga' => 'required',
        ];

        $validator = Validator::make($request->all(), $validate);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukan data',
                'barang' => $validator->errors()
            ]);
        }

        
        $dataBarang->nama = $request->nama;
        $dataBarang->harga = $request->harga;
        $dataBarang->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses mengupdate data barang',
        ]);
    }


    public function destroy(string $id)
    {
        $dataBarang = Barang::find($id);
        
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        $dataBarang->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses mendelete data barang',
        ]);
    }
}
