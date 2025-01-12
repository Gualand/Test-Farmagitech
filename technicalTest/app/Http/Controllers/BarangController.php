<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        $client = new Client();
        $url = "http://localhost:8000/api/barang";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();

        $contentArray = json_decode($content, true);
        $barang = $contentArray['barang'];


        return view('barang.index', ['barangs' =>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataBarang = [
            'nama' => $request->nama,
            'harga' => $request->harga
        ];

        $client = new Client();
        $url = "http://localhost:8000/api/barang";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($dataBarang)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['barang'];
            
            return redirect('barang')->withErrors($error);
        } else {
            return redirect('barang')->with('Sukses', 'Berhasil memasukan barang');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();

        $contentArray = json_decode($content, true);
        $barang = $contentArray['barang'];

        return view('barang.edit', ['barangs' =>$barang]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBarang = [
            'nama' => $request->nama,
            'harga' => $request->harga
        ];

        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";
        $response = $client->request('PUT', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($dataBarang)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['barang'];
            
            return redirect('barang')->withErrors($error);
        } else {
            return redirect('barang')->with('Sukses', 'Berhasil mengupdate barang');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://localhost:8000/api/barang/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status'] != true){
            $error = $contentArray['barang'];
            
            return redirect('barang')->withErrors($error);
        } else {
            return redirect('barang')->with('Sukses', 'Berhasil menghapus barang');
        }
    }
}
