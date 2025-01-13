@extends('layout.master')

@section('page')
    Form Tambah Barang
@endsection

@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm mt">
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
        <form action='/barang' method='post'>
            @csrf
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control border border-dark px-2" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control border border-dark px-2" name='harga' id="harga">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-12"><button type="submit" class="btn btn-secondary btn-sm" name="submit">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Daftar Barang</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $i }}</h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $barang['nama'] }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span>Rp. {{ $barang['harga'] }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <form action="{{ url('barang/'.$barang['id']) }}" method="POST">
                                    <a href="{{ url('barang/'.$barang['id'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"></input>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection