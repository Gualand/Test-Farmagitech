@extends('layout.master')

@section('page')
    Halaman List Penjualan
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Data Penjualan</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kode Penjualan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pembeli</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penjualan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Handphone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @foreach ($penjualans as $penjualan)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $i }}</h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $penjualan['id'] }}</p>
                            </td>
                            <td class="align-middle text-left text-sm">
                                <span>{{ $penjualan['nama_pembeli'] }}</span>
                            </td>
                            <td class="align-middle text-left text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{$penjualan['tanggal'] }}</p>
                            </td>
                            <td class="align-middle text-left text-sm">
                                <span>{{ $penjualan['no_hp'] }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span>Rp. {{ $penjualan['total_harga'] }}</span>
                            </td>
                            <td class="align-middle text-center">
                                    <form action={{ url('penjualan/'.$penjualan['id']) }} method="POST">
                                        <a href="{{ url('/penjualan/' . $penjualan['id']) }}" class="btn btn-warning btn-sm">Detail</a>
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
                <div class="mx-3">
                    <a class="btn bg-gradient-dark mt-4 w-100" href="/penjualan/create" type="button">Tambah Data Penjualan</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection