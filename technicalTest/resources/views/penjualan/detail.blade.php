{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Data Penjualan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Penjualan</th>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>No HP</th>
                    <th>Total Harga</th>
                    <th>Detail Penjualan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <div>
                        <h3>{{ $penjualan['nama_pembeli'] }}</h3>
                        <p>No HP: {{ $penjualan['no_hp'] }}</p>
                        <p>Total Harga: {{ $penjualan['total_harga'] }}</p>
                        <p>Tanggal Penjualan: {{ $penjualan['tanggal'] }}</p>
                        <h4>Detail Penjualan:</h4>
                        <ul>
                            @foreach ($penjualan['detail_penjualan'] as $detail)
                                <li>{{ $detail['barang']['nama'] }} - {{ $detail['jumlah'] }} unit</li>
                            @endforeach
                        </ul>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> --}}

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
    <main class="container">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="/penjualan" class="btn btn-warning mb-2">Kembali</a>
            <div class="d-flex justify-content-center">
                <h4 class="mb-4">Halaman Detail Penjualan</h4>
            </div>
            <h5>Atas nama : {{ $penjualans['nama_pembeli'] }}</h5>
            <div class="row">
                @foreach ($penjualans['detail_penjualan'] as $penjualan)
                    <div class="col-sm-6 mb-2">
                        <div class="card border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">Nama barang : {{ $penjualan['barang']['nama'] }}</h5>
                                <p class="card-text">Total pembelian : {{ $penjualan['jumlah'] }}</p>
                                <p class="card-text font-weight-lighter">Harga : {{ $penjualan['harga'] }}</p>
                            </div>
                        </div>
                    </div>                           
                @endforeach
            </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
