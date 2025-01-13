@extends('layout.master')

@section('page')
    Form Tambah Data Penjualan
@endsection

@section('content')
<div class="card my-4">
    <div class="card-body px-4 pb-2">
        <form method="POST" action="/penjualan">
            @csrf
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control border border-dark px-2" id="nama_pembeli" name="nama_pembeli" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control border border-dark px-2" id="no_hp" name="no_hp" required>
            </div>
            <div id="detail-penjualan-container">
                <h4>Detail Penjualan</h4>
                <div class="detail-item mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="barang_id" class="form-label">Barang</label>
                            <select name="detail_penjualan[0][barang_id]" class="form-select border border-dark px-2" required>
                                <option value="" disabled selected>Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang['id'] }}">{{ $barang['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" name="detail_penjualan[0][jumlah]" class="form-control border border-dark px-2" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="detail_penjualan[0][harga]" class="form-control border border-dark px-2" min="0" required>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" id="add-detail-penjualan" class="btn btn-info">Tambah Barang</button>
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="number" class="form-control border border-dark px-2" id="total_harga" name="total_harga" readonly>
            </div>
            <button type="submit" class="btn btn-success">Simpan Penjualan</button>
        </form>
    </div>
</div>
<script>
    let detailIndex = 1;

    document.getElementById('add-detail-penjualan').addEventListener('click', function () {
        const container = document.getElementById('detail-penjualan-container');
        const newDetail = `
            <div class="detail-item mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select name="detail_penjualan[${detailIndex}][barang_id]" class="form-select border border-dark px-2" required>
                            <option value="" disabled selected>Pilih Barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang['id'] }}">{{ $barang['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" name="detail_penjualan[${detailIndex}][jumlah]" class="form-control border border-dark px-2" min="1" required>
                    </div>
                    <div class="col-md-4">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="detail_penjualan[${detailIndex}][harga]" class="form-control border border-dark px-2" min="0" required>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newDetail);
        detailIndex++;
    });

    // Hitung Total Harga
    document.getElementById('detail-penjualan-container').addEventListener('input', function () {
        const hargaInputs = document.querySelectorAll('[name$="[harga]"]');
        const jumlahInputs = document.querySelectorAll('[name$="[jumlah]"]');
        let totalHarga = 0;

        hargaInputs.forEach((input, index) => {
            const harga = parseFloat(input.value) || 0;
            const jumlah = parseFloat(jumlahInputs[index].value) || 0;
            totalHarga += harga * jumlah;
        });

        document.getElementById('total_harga').value = totalHarga;
    });
</script>
@endsection