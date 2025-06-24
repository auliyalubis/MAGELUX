**MAGELUX (Magelang Explorer Unlocked Experience)**

🗺️ **Apa itu MAGELUX?**

MAGELUX adalah platform eksplorasi wisata berbasis WebGIS yang dirancang untuk memudahkan pengguna dalam menjelajahi destinasi wisata di Kota Magelang secara digital. Platform ini memungkinkan pengguna untuk:

🧭 Menelusuri peta interaktif berisi lokasi-lokasi wisata unggulan.

🏞️ Melihat informasi lengkap setiap destinasi, termasuk deskripsi, kategori, dan alamat.

📊 Mengakses data wisata dalam bentuk tabel yang rapi dan mudah dicari.

💬 Memberikan saran, melihat agenda event wisata, dan mengelola data melalui fitur interaktif (khusus pengguna login).


🧩 **Komponen Pengembang**

MAGELUX dikembangkan menggunakan framework Laravel 11 yang menjadi fondasi utama dalam membangun sistem manajemen data dan routing halaman. Tampilan antarmuka dibuat menggunakan Blade Template yang dipadukan dengan Bootstrap 5 untuk menghasilkan desain yang modern, responsif, dan mudah diakses di berbagai perangkat. Ikon dan elemen visual lainnya diperkaya dengan penggunaan FontAwesome, menciptakan tampilan yang menarik dan intuitif bagi pengguna.

Pada sisi pemetaan, MAGELUX menggunakan Leaflet.js sebagai library peta interaktif utama, dilengkapi dengan plugin Leaflet.draw untuk memungkinkan penambahan dan pengeditan geometri langsung pada peta. Data spasial disimpan dalam format WKT (Well-Known Text) dan diatur menggunakan PostgreSQL yang dikelola melalui DBeaver untuk kemudahan pengelolaan basis data. Untuk penyimpanan file seperti gambar, digunakan fitur Laravel Storage dengan direktori publik, memungkinkan integrasi gambar destinasi wisata secara efisien dan terstruktur. Kombinasi dari komponen-komponen ini menjadikan MAGELUX sebagai platform WebGIS wisata yang fungsional, fleksibel, dan siap dikembangkan lebih lanjut.

📌 **Fitur Utama**
