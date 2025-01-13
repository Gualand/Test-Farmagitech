@extends('layout.master')

@section('page')
    Halaman Detail Penjualan
@endsection

@section('content')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <a href="/penjualan" class="btn btn-info mb-2">Kembali</a>
            <div class="col-md-12 my-4">
                <div class="card">
                  <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Detail Information</h6>
                  </div>
                  <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                      <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                          <h6 class="mb-3 text-sm">{{ $penjualans['nama_pembeli'] }}</h6>
                          <span class="mb-2 text-xs">Tanggal Penjualan: <span class="text-dark font-weight-bold ms-sm-2"></span> {{ $penjualans['tanggal'] }} </span>
                          <span class="mb-2 text-xs">Kode Penjualan: <span class="text-dark ms-sm-2 font-weight-bold">{{ $penjualans['id'] }}</span></span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach ($penjualans['detail_penjualan'] as $penjualan)
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card mb-3">
                      <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                          <div>
                            <p class="text-sm mb-0 text-capitalize">{{ $penjualan['barang']['nama'] }}</p>
                            <h4 class="mb-0">Rp. {{ $penjualan['harga'] }}</h4>
                          </div>
                          <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">weekend</i>
                          </div>
                        </div>
                      </div>
                      <hr class="dark horizontal my-0">
                      <div class="card-footer p-2 ps-3">
                        <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">Total Item Penjualan : </span>{{ $penjualan['jumlah'] }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach   
              </div>
@endsection