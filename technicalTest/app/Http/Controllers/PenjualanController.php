<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://localhost:8000/api/penjualan'; 

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $penjualans = $contentArray['penjualan'];
        return view('penjualan.index', ['penjualans' => $penjualans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();
        $url = 'http://localhost:8000/api/barang'; 

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();

        $contentArray = json_decode($content, true);
        $barang = $contentArray['barang'];

        return view('penjualan.create', ['barangs' => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataPenjualan = [
            'tanggal' => now()->toDateString(),
            'nama_pembeli' => $request->nama_pembeli,
            'no_hp' => $request->no_hp,
            'total_harga' => $request->total_harga,
            'detail_penjualan' => $request->detail_penjualan
        ];

        $client = new Client();
        $url = 'http://localhost:8000/api/penjualan';
        $response = $client->request('POST', $url, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($dataPenjualan)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if ($contentArray['status'] == true) {
            return redirect('penjualan')->with('success', 'Berhasil menambahkan penjualan');
        } else {
            return redirect('penjualan/create')->withErrors($contentArray['message']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/penjualan/$id"; 

        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $penjualans = $contentArray['penjualan'];
        return view('penjualan.detail', ['penjualans' => $penjualans]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $client = new Client();
        $url = "http://localhost:8000/api/penjualan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['penjualan'];
            
            return redirect('penjualan')->withErrors($error);
        } else {
            return redirect('penjualan')->with('Sukses', 'Berhasil menghapus barang');
        }
    }
}
