@extends('layout.template')

@section('styles')
    <style>
        .custom-navbar {
            background-color: #26323d;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            min-height: 56px;
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

        .custom-navbar .dropdown-item:hover {
            background-color: #002244;
        }
    </style>
@endsection

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaf5f5;
        }

        .landing-hero {
            background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 51, 102, 0.7)),
                url('{{ asset('images/background.jpg') }}') center/cover no-repeat;
            color: white;
            padding: 100px 30px;
            text-align: left;
            position: relative;
        }

        .landing-hero h1 {
            font-size: 48px;
            font-weight: 800;
        }

        .landing-hero p {
            font-size: 18px;
            margin-top: 20px;
            max-width: 600px;
        }

        .row-layout {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .text-column {
            flex: 1 1 55%;
            padding-right: 20px;
        }

        .image-column {
            flex: 1 1 40%;
            text-align: center;
        }

        .image-column img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-book,
        .btn-table {
            margin-top: 30px;
            margin-right: 10px;
            background-color: #00c0a3;
            color: white;
            border: none;
            padding: 12px 28px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-table {
            background-color: #1f78b4;
        }

        .section-card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            border-radius: 12px;
            padding: 40px;
            max-width: 1000px;
        }

        .section-card h3,
        .section-card h4 {
            font-weight: bold;
            color: #003366;
        }

        .section-card p,
        .section-card ul {
            font-size: 16px;
            color: #444;
        }

        .info-footer {
            background-color: #f3f3f3;
            padding: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin: 60px auto;
            padding: 0 20px;
            max-width: 1000px;
        }

        .feature-item {
            background-color: white;
            border-radius: 12px;
            padding: 35px 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .feature-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .feature-item i {
            font-size: 48px;
            color: #009f9f;
            margin-bottom: 18px;
        }

        .feature-item h5 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #002b4d;
        }

        .feature-item p {
            font-size: 15px;
            color: #555;
        }

        .badge {
            font-size: 15px;
        }
    </style>

    <!-- Hero Section -->
    <div class="landing-hero row-layout" style="padding: 140px 60px;">
        <div class="text-column">
            <h1
                style="font-family: 'Playfair Display', serif; font-size: 75px; font-weight: 700; margin-bottom: 0; color: #ffffff;">
                MAGELUX
            </h1>
            <h2
                style="font-family: 'Raleway', sans-serif; font-size: 42px; font-weight: 300; margin-top: 5px; color: #f0f0f0;">
                Magelang Explorer Unlocked Experience
            </h2>
            <p style="margin-bottom: 30px;">
                Temukan keindahan wisata Kota Magelang melalui MAGELUX – platform eksplorasi wisata modern yang menyajikan
                peta interaktif, visual udara, dan titik destinasi yang tersebar indah. Jelajahi lokasi-lokasi menarik dan
                sejarah yang kaya dari kota sejuk ini.
            </p>
            <a href="/map" class="btn-book">LIHAT PETA</a>
            <a href="/table" class="btn-table">LIHAT TABEL</a>
        </div>
        <div class="image-column">
            <img src="https://images.pexels.com/photos/5505474/pexels-photo-5505474.jpeg" class="img-fluid rounded"
                alt="Borobudur Temple">
        </div>
    </div>

    <!-- Statistik -->
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-md-4">
                <h2 class="text-success fw-bold">25+</h2>
                <p>Destinasi Wisata</p>
            </div>
            <div class="col-md-4">
                <h2 class="text-primary fw-bold">5</h2>
                <p>Kategori Wisata</p>
            </div>
            <div class="col-md-4">
                <h2 class="text-warning fw-bold">10+</h2>
                <p>Fasilitas Pendukung</p>
            </div>
        </div>
    </div>

    <!-- Fitur Aplikasi -->
    <div class="features container">
        <div class="feature-item">
            <i class="bi bi-map"
                style="background: linear-gradient(to right, #00c0a3, #1f78b4); -webkit-background-clip: text; color: transparent;"></i>
            <h5>Peta Interaktif</h5>
            <p>Eksplorasi spasial lokasi wisata dengan peta digital yang mudah digunakan.</p>
        </div>
        <div class="feature-item">
            <i class="bi bi-table"></i>
            <h5>Tabel Destinasi</h5>
            <p>Tampilan data tempat wisata dalam bentuk tabel yang rapi dan informatif.</p>
        </div>
    </div>

    <!-- Tentang Magelang -->
    <div class="section-card">
        <h3><i class="bi bi-geo-alt-fill me-2"></i>Tentang Kota Magelang</h3>
        <p>
            Kota Magelang merupakan kota kecil yang terletak di jantung Provinsi Jawa Tengah, Indonesia, dan dikenal dengan
            suasananya yang asri, nilai sejarah yang kaya, serta pesona wisata budayanya. Berada di kaki Gunung Tidar, kota
            ini menyuguhkan udara sejuk, situs-situs bersejarah, dan berbagai destinasi menarik yang menjadikannya tempat
            ideal untuk dikunjungi dan dijelajahi. Melalui website ini, wisatawan dapat menjelajahi peta tematik dan visual
            interaktif guna menemukan tempat-tempat terbaik untuk dikunjungi. Dengan beragam daya tarik yang dimilikinya,
            Kota Magelang siap memberi pengalaman yang berkesan bagi setiap pengunjung yang datang.
        </p>
    </div>

    <!-- Kategori Wisata -->
    <div class="section-card text-center">
        <h4><i class="bi bi-tags-fill me-2"></i>Kategori Wisata</h4>
        <div class="mt-3">
            <span class="badge bg-success mx-1 p-2">Alam</span>
            <span class="badge bg-primary mx-1 p-2">Sejarah</span>
            <span class="badge bg-warning text-dark mx-1 p-2">Edukasi</span>
            <span class="badge bg-danger mx-1 p-2">Religi</span>
            <span class="badge bg-info text-dark mx-1 p-2">Kuliner</span>
        </div>
    </div>

    <!-- Lokasi Populer -->
    <div class="section-card">
        <h4><i class="bi bi-star-fill me-2"></i>Lokasi Wisata Populer</h4>
        <ul>
            <li><strong>Candi Borobudur</strong> – Warisan Dunia UNESCO</li>
            <li><strong>Taman Kyai Langgeng</strong> – Taman edukasi keluarga</li>
            <li><strong>Taman Senopati</strong> – Taman hijau di tengah kota</li>
        </ul>
    </div>

    <!-- Event Wisata -->
    <div class="section-card mt-4">
        <h4><i class="bi bi-calendar-event me-2"></i>Event & Festival Wisata</h4>
        <ul>
            <li><strong>Hari Jadi Magelang</strong> – 11 April 2025</li>
            <li><strong>Grebeg Getuk</strong> – 13 April 2025</li>
            <li><strong>Magelang Tempo Doeloe</strong> – 10 s.d. 12 Mei 2025</li>
            <li><strong>Borobudur Vesak Lantern Festival</strong> – Mei 2025 (Waisak)</li>
            <li><strong>Borobudur International Tourism Expo (BITE)</strong> – 15 s.d. 17 Juni 2025</li>
            <li><strong>Festival Getuk</strong> – 5 Juli 2025</li>
            <li><strong>Magelang Fair</strong> – 1 s.d. 5 Juli 2025</li>
            <li><strong>Cultural Parade Borobudur</strong> – 21 Agustus 2025</li>
            <li><strong>Planimaphoria (Expo Tanaman Hias)</strong> – 3 s.d. 5 Januari 2025</li>
        </ul>

        <!-- Tombol Lihat Event -->
        <div class="mt-3">
            <a href="{{ route('events.index') }}" class="btn btn-primary">
                <i class="bi bi-eye-fill me-1"></i> Lihat Semua Event
            </a>
        </div>
    </div>

    <!-- Form Saran -->
    <div class="section-card">
        <h4><i class="bi bi-chat-left-text me-2"></i>Saran Destinasi Baru</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('saran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_tempat" class="form-label">Nama Tempat</label>
                <input type="text" class="form-control" id="nama_tempat" name="nama_tempat" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>
            <button type="submit" class="btn btn-success">Kirim Saran</button>
        </form>
    </div>

    <!-- Profil Praktikan -->
    <div class="section-card">
        <h4><i class="bi bi-person-circle me-2"></i>Informasi Praktikum</h4>
        <ul>
            <li><strong>Nama:</strong> Aul</li>
            <li><strong>NIM:</strong> 23/513607/SV/22236</li>
            <li><strong>Kelas:</strong> A</li>
            <li><strong>Mata Kuliah:</strong> Praktikum Pemrograman Geospasial Web Lanjut</li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="info-footer">
        &copy; 2025 - Sistem Informasi Geospasial | Universitas Gadjah Mada - Pemrograman Geospasial Web Lanjut
    </div>

    <!-- Bootstrap Icons (Required) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
