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
    <main class="container mt-5">
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand mx-auto text-center" href="#">Store Management</a>
                <button class="navbar-toggler position-absolute end-0 me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Sidebar Store Management</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/barang">Daftar Barang</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/penjualan">Daftar Penjualan</a>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>          
        </nav>
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="/penjualan/create" class="btn btn-info btn-sm mb-2">Tambah Data Penjualan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-1">Kode Penjualan</th>
                        <th class="col-md-2">Nama Pembeli</th>
                        <th class="col-md-2">Tanggal</th>
                        <th class="col-md-2">No Hp</th>
                        <th class="col-md-2">Total Harga</th>
                        <th class="col-md-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach ($penjualans as $penjualan)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{  $penjualan['id'] }}</td>
                            <td>{{ $penjualan['nama_pembeli'] }}</td>
                            <td>{{ $penjualan['tanggal'] }}</td>
                            <td>{{ $penjualan['no_hp'] }}</td>
                            <td>{{ $penjualan['total_harga'] }}</td>
                            <td>
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
        </div>
        <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
