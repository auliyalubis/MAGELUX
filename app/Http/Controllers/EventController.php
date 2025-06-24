<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $title = "Event & Festival Wisata";

        $events = [
            [
                'title' => 'Hari Jadi Magelang',
                'date' => '11 April 2025',
                'description_short' => 'Peringatan spesial Hari Jadi Kota Magelang dengan berbagai acara seni, budaya, dan hiburan khas daerah.',
                'description_full' => 'Peringatan spesial Hari Jadi Kota Magelang yang memadukan berbagai acara seni, budaya, dan hiburan untuk memeriahkan momen bersejarah ini. Berbagai pertunjukan tradisional, pameran karya daerah, hingga acara musik modern turut digelar, menjadikan suasana penuh semangat dan kebersamaan bagi seluruh warga maupun wisatawan yang hadir dari berbagai daerah.',
                'image' => 'hari-jadi-magelang.jpeg',
            ],
            [
                'title' => 'Grebeg Getuk',
                'date' => '13 April 2025',
                'description_short' => 'Parade getuk raksasa yang memadukan kesenian daerah dengan semangat kebersamaan dan kegembiraan warga Magelang.',
                'description_full' => 'Grebeg Getuk adalah festival khas Magelang yang menampilkan parade getuk raksasa sebagai simbol kemakmuran dan semangat kebersamaan. Berbagai pertunjukan seni daerah, kirab, dan lomba membuat getuk turut meramaikan acara ini, membawa semangat pelestarian nilai-nilai lokal dari generasi ke generasi, serta menjadikan suasana penuh keceriaan bagi siapa pun yang datang.',
                'image' => 'grebeg-gethuk.jpg',
            ],
            [
                'title' => 'Magelang Tempo Doeloe',
                'date' => '10 s.d. 12 Mei 2025',
                'description_short' => 'Ajang nostalgia dengan suasana Magelang zaman dahulu, lengkap dengan pameran dan pertunjukan kesenian daerah yang penuh makna.',
                'description_full' => 'Ajang nostalgia yang membawa pengunjung menjelajahi Magelang dari masa lampau. Berbagai atraksi khas tempo dulu, mulai dari pameran benda antik, pertunjukan kesenian daerah, hingga suasana pasar jadul yang penuh makna, membuat acara ini terasa seperti mesin waktu bagi siapa pun yang hadir. Kesempatan langka untuk merasakan dan menghargai nilai-nilai sejarah yang membentuk kota ini dari masa ke masa.',
                'image' => 'magelang-tempo-doeloe.png',
            ],
            [
                'title' => 'Borobudur Vesak Lantern Festival',
                'date' => 'Mei 2025 (Waisak)',
                'description_short' => 'Ribuan lampion menghiasi langit Borobudur, membawa pesan damai dan spiritualitas bagi pengunjung dari berbagai daerah dan negara.',
                'description_full' => 'Ribuan lampion menghiasi langit di kawasan Candi Borobudur, membawa pesan damai dan spiritualitas bagi para pengunjung dari berbagai daerah dan mancanegara. Event ini bukan hanya perayaan agama, tetapi juga momen refleksi dan apresiasi nilai-nilai perdamaian, kesakralan, dan keindahan situs warisan dunia yang penuh makna bagi umat manusia dari berbagai latar belakang dan keyakinan.',
                'image' => 'borobudur-vesak.jpeg',
            ],
            [
                'title' => 'Borobudur International Tourism Expo (BITE)',
                'date' => '15 s.d. 17 Juni 2025',
                'description_short' => 'Pameran pariwisata internasional dengan berbagai produk wisata dan pertunjukan seni daerah dari berbagai daerah dan negara.',
                'description_full' => 'Ajang pameran pariwisata internasional yang mempertemukan pelaku wisata dari berbagai daerah dan negara. Berbagai produk wisata, pertunjukan seni daerah, hingga teknologi pariwisata modern dipamerkan guna memperluas jejaring kerja sama dan memperkenalkan pesona Borobudur dan Magelang sebagai destinasi kelas dunia yang kaya nilai sejarah, seni, dan kebudayaan bagi wisatawan dari seluruh dunia.',
                'image' => 'bite.jpg',
            ],
            [
                'title' => 'Festival Getuk',
                'date' => '5 Juli 2025',
                'description_short' => 'Pesta kuliner khas Magelang yang menampilkan aneka getuk dengan variasi bentuk, warna, dan cita rasa yang memikat.',
                'description_full' => 'Pesta kuliner khas Magelang yang menjadikan getuk sebagai ikon daerah. Berbagai varian getuk dengan bentuk, warna, dan cita rasa unik siap memanjakan lidah para pengunjung. Tak hanya soal makanan, acara ini juga diramaikan dengan pertunjukan seni daerah, lomba membuat getuk, hingga aktivitas edukasi yang membawa semangat pelestarian warisan kuliner dan budaya bagi semua kalangan usia.',
                'image' => 'festival-getuk.jpg',
            ],
            [
                'title' => 'Magelang Fair',
                'date' => '1 s.d. 5 Juli 2025',
                'description_short' => 'Pameran produk dan karya kreatif daerah Magelang yang memadukan UMKM, seni, teknologi, dan berbagai pertunjukan daerah yang semarak.',
                'description_full' => 'Pameran produk dan karya kreatif daerah Magelang yang memadukan UMKM, seni, teknologi, dan berbagai pertunjukan daerah yang semarak. Event ini memberikan kesempatan bagi pelaku usaha kecil hingga besar untuk memperkenalkan karya dan produk unggulan daerah, sambil memberi pengalaman edukasi dan hiburan bagi wisatawan maupun masyarakat sekitar dalam semangat kerja sama dan kemajuan daerah Magelang.',
                'image' => 'magelang-fair.jpg',
            ],
            [
                'title' => 'Cultural Parade Borobudur',
                'date' => '21 Agustus 2025',
                'description_short' => 'Parade seni dan budaya dari berbagai daerah Indonesia yang berlangsung dengan latar megah Candi Borobudur yang penuh makna.',
                'description_full' => 'Parade seni dan budaya dari berbagai daerah Indonesia yang digelar dengan latar megah Candi Borobudur. Berbagai kostum daerah, musik, dan tarian memukau hadir untuk merayakan semangat kebersamaan dan keberagaman nusantara. Event ini juga membawa pesan pelestarian seni dan nilai-nilai adat daerah, menjadikan pengalaman wisata yang tak terlupakan bagi siapa pun yang menyaksikannya dari dekat.',
                'image' => 'cultural-parade.jpeg',
            ],
            [
                'title' => 'Planimaphoria (Expo Tanaman Hias)',
                'date' => '3 s.d. 5 Januari 2025',
                'description_short' => 'Pameran tanaman hias dan produk pertanian dari pelaku usaha hortikultura daerah Magelang dan sekitarnya.',
                'description_full' => 'Ajang pameran tanaman hias dan produk pertanian dari pelaku usaha hortikultura daerah Magelang dan sekitarnya. Berbagai koleksi tanaman langka, pelatihan urban farming, hingga tips merawat tanaman dari para ahli membuat acara ini menjadi surga bagi para pecinta tanaman dan siapa pun yang ingin menghijaukan rumah dengan tanaman cantik dan eksotis dari daerah Magelang.',
                'image' => 'planimaphoria.jpg',
            ],
        ];

        return view('event', compact('title', 'events'));
    }
}
