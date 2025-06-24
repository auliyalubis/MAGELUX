@extends('layout.template')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card custom-card">
            <div class="card-header" style="background-color: #254465; color: #fff;">
                <h4 class="mb-0">Saran Destinasi</h4>
            </div>
            <div class="card-body custom-card-body" style="background-color: #f3f7fc;">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped align-middle" id="sarantable">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Tempat</th>
                                <th>Lokasi</th>
                                <th>Dikirim Pada</th>
                                <th>Aksi</th> <!-- Kolom Aksi Ditambahkan -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($saran as $item)
                                <tr>
                                    <td class="text-center">{{ $saran->firstItem() + $loop->index }}</td>
                                    <td>{{ $item->nama_tempat }}</td>
                                    <td style="min-width:300px; white-space:normal; word-break:break-word;">
                                        {{ $item->lokasi }}
                                    </td>
                                    <td class="text-center">{{ $item->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('saran.destroy', $item->id) }}"
                                            onsubmit="return confirm('Yakin mau hapus saran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada saran destinasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination Bootstrap -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $saran->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('styles')
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #eaf5f5;
            }

            .custom-navbar {
                background-color: #26323d;
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
            }

            .custom-navbar .dropdown-menu {
                background-color: #003366;
            }

            .custom-navbar .dropdown-item {
                color: white;
            }

            .custom-navbar .dropdown-item:hover {
                background-color: #002244;
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

            /* Tabel responsif */
            .table-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    @endsection

    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.1/js/dataTables.dataTables.min.js"></script>
        <script>
            let tablesaran = new DataTable('#sarantable');
        </script>
    @endsection
