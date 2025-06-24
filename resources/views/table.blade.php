@extends('layout.template')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card custom-card">
            <div class="card-header" style="background-color: #254465; color: #fff;">
                <h4>Lokasi Wisata</h4>
            </div>
            <div class="card-body custom-card-body" style="background-color: #f3f7fc;">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped align-middle" id="pointstable">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($points as $p)
                                <tr>
                                    <td class="text-center">
                                        {{ ($points->currentPage() - 1) * $points->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->category }}</td>
                                    <td style="min-width:300px; white-space:normal; word-break:break-word;">
                                        {{ $p->description }}
                                    </td>
                                    <td style="min-width:250px; white-space:normal; word-break:break-word;">
                                        {{ $p->address }}
                                    </td>
                                    <td class="text-center"><img src="{{ asset('storage/images/' . $p->image) }}"
                                            alt="" style="width:285px;" title="{{ $p->image }}"></td>
                                    <td>{{ $p->created_at }}</td>
                                    <td>{{ $p->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination untuk Tabel Point -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $points->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        @endsection

        @section('styles')
            <!-- Tambahan Styling untuk Table -->
            <style>
                body {
                    font-family: 'Segoe UI', sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #eaf5f5;
                }

                .custom-navbar {
                    background-color: #26323d;
                    /* Ganti warna sesuai keinginan */
                }

                .custom-navbar .navbar-brand,
                .custom-navbar .nav-link,
                .custom-navbar .dropdown-toggle,
                .custom-navbar .dropdown-item {
                    color: white !important;
                }

                .custom-navbar .nav-link:hover,
                .custom-navbar .dropdown-item:hover {
                    color: #ffdd57 !important;
                    /* Hover efek kuning */
                }

                .custom-navbar .dropdown-menu {
                    background-color: #003366;
                    /* Warna dropdown menu */
                }

                .custom-navbar .dropdown-item {
                    color: white;
                }

                .custom-navbar .dropdown-item:hover {
                    background-color: #002244;
                    /* Hover dropdown item */
                }

                /* Aturan Tampilan Khusus untuk Card Lokasi Wisata */
                .custom-card {
                    max-width: 1500px;
                    /* Agar kotak lebih lebar */
                    margin: 0 auto;
                    /* Agar berada di tengah */
                    border-radius: 10px;
                    box-shadow: 0px 4px 15px rgba(0, 51, 102, 0.25);
                }

                .custom-card-body {
                    padding: 30px;
                    /* Memberi ruang agar tabel tidak mepet dengan pinggir */
                }

                .table-hover tbody tr:hover {
                    background-color: #26323d;
                }

                .table thead.table-dark th {
                    background-color: #26323d !important;
                    color: #f2efef !important;
                    font-size: 1rem;
                    text-align: center;
                }

                .table td,
                .table th {
                    vertical-align: top;
                }

                /* Membungkus table agar bisa digeser */
                .table-wrapper {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }

                /* Atur lebar spesifik masing-masing kolom tabel Point */
                #pointstable th:nth-child(1),
                #pointstable td:nth-child(1) {
                    min-width: 50px;
                }

                #pointstable th:nth-child(2),
                #pointstable td:nth-child(2) {
                    min-width: 150px;
                }

                #pointstable th:nth-child(3),
                #pointstable td:nth-child(3) {
                    min-width: 100px;
                }

                #pointstable th:nth-child(4),
                #pointstable td:nth-child(4) {
                    min-width: 480px;
                }

                #pointstable th:nth-child(5),
                #pointstable td:nth-child(5) {
                    min-width: 280px;
                }

                #pointstable th:nth-child(6),
                #pointstable td:nth-child(6) {
                    min-width: 300px;
                }

                #pointstable th:nth-child(7),
                #pointstable td:nth-child(7),
                #pointstable th:nth-child(8),
                #pointstable td:nth-child(8) {
                    min-width: 130px;
                }

                /* Ukuran Tabel */
                #pointstable td img,
                #polylinestable td img,
                #polygonstable td img {
                    max-width: 250px;
                    height: auto;
                    object-fit: cover;
                    border-radius: 3px;
                }

                /* Aturan khusus untuk gambar */
                .img-preview {
                    width: 100%;
                    /* Agar sesuai dengan lebar kolom */
                    max-width: 180px;
                    /* Ukuran maksimal agar tidak terlalu besar */
                    height: 120px;
                    /* Atur tinggi agar seragam */
                    object-fit: cover;
                    /* Memotong gambar agar tidak berubah rasio */
                    border-radius: 4px;
                    /* Memberi sudut membulat */
                    display: block;
                    margin: auto;
                }
            </style>
            <!-- DataTables Styles -->
            <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
        @endsection

        @section('script')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src="https://cdn.datatables.net/2.3.1/js/dataTables.dataTables.min.js"></script>
            <script>
                let tablepoints = new DataTable('#pointstable');
                let tablepolylines = new DataTable('#polylinestable');
                let tablepolygons = new DataTable('#polygonstable');
            </script>
        @endsection
