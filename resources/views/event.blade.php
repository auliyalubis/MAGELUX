@extends('layout.template')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #d9f2f2, #f9f9ff);
        }

        .event-header {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            margin: 40px 0 20px 0;
            text-shadow: 1px 1px 3px rgba(0, 51, 102, 0.3);
        }

        /* Event Card */
        .event-card {
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
            background: linear-gradient(135deg, #d4c0c0, #1b2433);
            border: 1px solid #232d3b;
            box-shadow: 0px 3px 15px rgba(0, 51, 102, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 520px;
            /* Tambahan agar tinggi konsisten */
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 12px 25px rgba(0, 51, 102, 0.25);
        }

        .event-image {
            height: 250px;
            object-fit: cover;
            border-bottom: 4px solid #006080;
        }

        .event-body {
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .event-body h5 {
            font-size: 22px;
            font-weight: 600;
            color: #002b4d;
        }

        .event-date {
            font-size: 15px;
            color: #555;
        }

        .event-description {
            font-size: 14px;
            color: #444;
            text-align: justify;
        }

        .event-footer {
            text-align: right;
            padding: 15px 20px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .event-footer button {
            font-weight: 600;
            color: #1f78b4;
        }

        .event-footer button:hover {
            color: #005580;
        }

        /* Beri efek hover khusus untuk link */
        .event-footer .btn-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container mt-4">
        <h2 class="event-header"><i class="bi bi-calendar-event"></i> Daftar Event & Festival Wisata</h2>
        <div class="row justify-content-center">
            @foreach ($events as $event)
                <div class="col-md-5 col-lg-4 col-sm-12 mb-4 d-flex">
                    <div class="event-card w-100">
                        <img src="{{ asset('images/events/' . $event['image']) }}" class="event-image"
                            alt="{{ $event['title'] }}">
                        <div class="event-body">
                            <h5><i class="bi bi-flag-fill"></i> {{ $event['title'] }}</h5>
                            <p class="event-date"><i class="bi bi-clock"></i> Tanggal: {{ $event['date'] }}</p>
                            <h6 class="mt-3" style="color: #006666;"><i class="bi bi-info-circle-fill"></i> Deskripsi</h6>
                            <p class="event-description">
                                {{ $event['description_short'] }}
                            </p>
                        </div>
                        <div class="event-footer p-3">
                            <!-- Tombol untuk Modal Detail Event -->
                            <button type="button" class="btn btn-link p-0" data-bs-toggle="modal"
                                data-bs-target="#eventModal{{ $loop->index }}">
                                <i class="bi bi-arrow-right-circle"></i> Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- MODAL DETAIL EVENT -->
                <div class="modal fade" id="eventModal{{ $loop->index }}" tabindex="-1"
                    aria-labelledby="eventModalLabel{{ $loop->index }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel{{ $loop->index }}">
                                    <i class="bi bi-flag-fill"></i> {{ $event['title'] }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('images/events/' . $event['image']) }}" alt="{{ $event['title'] }}"
                                    class="img-fluid rounded-3 mb-3">
                                <p><i class="bi bi-clock"></i> <strong>Tanggal:</strong> {{ $event['date'] }}</p>
                                <h6 class="mt-3"><i class="bi bi-info-circle-fill"></i> Deskripsi Lengkap</h6>
                                <p style="text-align: justify;">
                                    {{ $event['description_full'] }}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
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

        .modal-content {
            background: linear-gradient(135deg, #384d66, #497093);
            color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 51, 102, 0.5);
        }

        .modal-header {
            background-color: rgba(255, 255, 255, 0.1);
            border-bottom: none;
        }

        .modal-header .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #ffdd57;
        }

        .modal-body p {
            color: #e8f3ff;
            font-size: 15px;
        }

        .modal-body h6 {
            font-size: 16px;
            font-weight: bold;
            color: #ffe57f;
        }

        .modal-footer .btn-secondary {
            background-color: #006080;
            border: none;
            color: #ffffff;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #004d66;
        }

        .btn-close {
            filter: invert(1);
        }

        .modal.fade .modal-dialog {
            transform: translateY(-30px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal.show .modal-dialog {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
@endsection
