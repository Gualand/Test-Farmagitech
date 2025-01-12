<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technical Test Farmagitech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
        <div class="container">
            <h1>Buat Penjualan Baru</h1>
            <form method="POST" action="/penjualan">
                @csrf
                <!-- Nama Pembeli -->
                <div class="mb-3">
                    <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
                </div>
        
                <!-- Nomor HP -->
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                </div>
    
        
                <!-- Detail Penjualan -->
                <div id="detail-penjualan-container">
                    <h4>Detail Penjualan</h4>
                    <div class="detail-item mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="barang_id" class="form-label">Barang</label>
                                <select name="detail_penjualan[0][barang_id]" class="form-select" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang['id'] }}">{{ $barang['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="detail_penjualan[0][jumlah]" class="form-control" min="1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="detail_penjualan[0][harga]" class="form-control" min="0" required>
                            </div>
                            
                        </div>
                    </div>
                </div>
        
                <!-- Tombol Tambah Detail -->
                <div class="mb-3">
                    <button type="button" id="add-detail-penjualan" class="btn btn-success">Tambah Barang</button>
                </div>
        
                <!-- Total Harga -->
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                </div>
        
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
            </form>
        </div>
        
        <script>
            let detailIndex = 1;
        
            // Tambah Detail Penjualan
            document.getElementById('add-detail-penjualan').addEventListener('click', function () {
                const container = document.getElementById('detail-penjualan-container');
                const newDetail = `
                    <div class="detail-item mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="barang_id" class="form-label">Barang</label>
                                <select name="detail_penjualan[${detailIndex}][barang_id]" class="form-select" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang['id'] }}">{{ $barang['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="detail_penjualan[${detailIndex}][jumlah]" class="form-control" min="1" required>
                            </div>
                            <div class="col-md-4">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="detail_penjualan[${detailIndex}][harga]" class="form-control" min="0" required>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>