@extends('layout.master')

@section('page')
    Halaman Edit Barang
@endsection

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('Sukses'))
        <div class="alert alert-success">
            {{ session('Sukses') }}
        </div>
    @endif
    <form action='/barang/{{ $barangs['id'] }}' method='post'>
        @csrf
        @method('put')
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-12">
                <input type="text" class="form-control border border-dark px-2" name='nama' id="nama" value="{{ $barangs['nama'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
            <div class="col-sm-12">
                <input type="text" class="form-control border border-dark px-2" name='harga' id="harga" value="{{ $barangs['harga'] }}">
            </div>
        </div>
        <div class="mt-2 row">
            <div class="col-sm-2"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </form>
</div>
@endsection