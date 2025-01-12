<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::with('detailPenjualan')->get(); // Ambil penjualan beserta detailnya

        return response()->json([
            'status' => true,
            'message' => 'Data penjualan ditemukan',
            'penjualan' => $penjualan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'nama_pembeli' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'total_harga' => 'required|numeric',
            'detail_penjualan' => 'required|array',
            'detail_penjualan.*.barang_id' => 'required|exists:barang,id', 
            'detail_penjualan.*.jumlah' => 'required|integer|min:1',
            'detail_penjualan.*.harga' => 'required|integer|min:0', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data penjualan',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Menyimpan data penjualan
        $penjualan = new Penjualan();
        $penjualan->tanggal = $request->tanggal;
        $penjualan->nama_pembeli = $request->nama_pembeli;
        $penjualan->no_hp = $request->no_hp;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->save();

        // Menyimpan detail penjualan
        foreach ($request->detail_penjualan as $detail) {
            $penjualan->detailPenjualan()->create([
                'penjualan_id' => $penjualan->id,
                'barang_id' => $detail['barang_id'],
                'jumlah' => $detail['jumlah'],
                'harga' => $detail['harga'],
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data penjualan',
            'penjualan' => $penjualan,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = Penjualan::with('detailPenjualan.barang')->find($id);

        if ($penjualan) {
            return response()->json([
                'status' => true,
                'message' => 'Data penjualan ditemukan',
                'penjualan' => $penjualan
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data penjualan tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataPenjualan = Penjualan::find($id);
        
        if (empty($dataPenjualan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data barang tidak ditemukan'
            ], 404);
        }

        $dataPenjualan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses mendelete data barang',
        ]);
    }
}
