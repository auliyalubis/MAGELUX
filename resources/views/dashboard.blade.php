<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 dark:text-blue-300 leading-tight flex items-center space-x-3">
            <i class="fa-solid fa-map-marked-alt text-blue-600"></i>
            <span>Dashboard Sebaran Wisata Kota Magelang</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-blue-100 to-blue-50 dark:from-gray-800 dark:to-gray-700 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Seksi Selamat Datang -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg">
                <h3 class="text-2xl font-bold text-blue-900 dark:text-white">Selamat datang di Dashboard!</h3>
                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    Jelajahi berbagai tempat wisata menarik yang tersebar di Kota Magelang. Akses data dan informasi
                    lengkap untuk membuat perjalananmu lebih menyenangkan.
                </p>

                <div class="mt-4 text-left">
                    <a href="{{ route('home') }}"
                        class="text-blue-700 font-bold underline hover:text-blue-900 transition duration-300">
                        <i class="bi bi-house-door-fill me-1"></i> Kembali ke Home
                    </a>
                </div>
            </div>

            <!-- Seksi Statistik Ringkasan -->
            <div class="grid sm:grid-cols-3 gap-6">
                <!-- Box 1 -->
                <div
                    class="bg-gradient-to-br from-blue-200 to-blue-100 rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-map-marker-alt text-3xl text-blue-700"></i>
                    </div>
                    <h5 class="text-blue-900 dark:text-white font-bold text-xl mt-3">Tempat Wisata</h5>
                    <p class="text-4xl font-extrabold text-blue-700 mt-1">25</p>
                    <span class="text-gray-600 dark:text-gray-300">Lokasi Terdaftar</span>
                </div>

                <!-- Box 2 -->
                <div
                    class="bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-users text-3xl text-blue-700"></i>
                    </div>
                    <h5 class="text-blue-900 dark:text-white font-bold text-xl mt-3">Pengunjung Bulanan</h5>
                    <p class="text-4xl font-extrabold text-blue-700 mt-1">1.200+</p>
                    <span class="text-gray-600 dark:text-gray-300">Pengunjung per Bulan</span>
                </div>

                <!-- Box 3 -->
                <div
                    class="bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl p-6 text-center shadow-lg transform hover:scale-105 transition duration-300">
                    <div class="flex justify-center">
                        <i class="fa-solid fa-star text-3xl text-blue-700"></i>
                    </div>
                    <h5 class="text-blue-900 dark:text-white font-bold text-xl mt-3">Rekomendasi Populer</h5>
                    <p class="text-4xl font-extrabold text-blue-700 mt-1">3</p>
                    <span class="text-gray-600 dark:text-gray-300">Tempat Favorit</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
