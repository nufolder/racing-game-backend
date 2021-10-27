@extends('layouts.app-user')

@section('title')
<title>Profile</title>
@endsection

@section('content')
<div class="container p-3 bg-red mw-600 dashboard pb-5 minh">

    <center><img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid py-4 mt-3"></center>
    <h1 class="text-center mt-3 text-white">Aturan ermainan</h1>
    <p class="privacy-policy">
        <ol class="content">
            <li class="list-policy mb-3">
                Registrasi menggunakan e-mail, nomor handphone aktif dan isi sejumlah data
            </li>
            <li class="list-policy mb-3">
                Jangan lupa follow akun Instagram AHRT <a href="https://www.instagram.com/astrahondaracingteam/" target="_blank" style="color: #ffc210;">@astrahondaracingteam</a>
            </li>
            <li class="list-policy mb-3">
                Login untuk memulai permainan
            </li>
            <li class="list-policy mb-3">
                Klik “Start Race"
            </li>
            <li class="list-policy mb-3">
                Gunakan panah kanan dan kiri untuk mengengendalikan sepeda motor
            </li>
            <li class="list-policy mb-3">
                Mainkan dan kumpulkan tiket sebanyak-banyaknya untuk meraih kesempatan memenangkan hadiah utama dan hadiah mingguan
            </li>
            <li class="list-policy mb-3">
                1 tiket akan didapatkan bila kamu mendapatkan score 5.000 berlaku kelipatan
            </li>
            <li class="list-policy mb-3">
                Kamu bisa membeli rider dengan cara mengumpulkan sejumlah koin. Semakin tinggi kelas rider, semakin banyak tiket yang bisa kamu dapatkan
            </li>
            <li class="list-policy mb-3">
                Setiap harinya nyawa akan direset dan mendapat 3 nyawa. Untuk menambah nyawa per hari bisa memainkan mini games (trivia, memory game, nonton video, dan share ke sosial media)
            </li>
            <li class="list-policy mb-3">
                Pemenang utama akan memenangkan1 unit Honda CBR150 R </ yang diundi di akhir periode dari perolehan tiket peserta. 4 pemenang mingguan akan mendapatkan uang elektronik sebesar Rp 250.000. Peserta hanya bisa memenangkan hadiah mingguan sebanyak satu kali. Weekly Leaderboard akan di reset setiap minggunya
            </li>
            <li class="list-policy mb-3">
                PT Astra Honda Motor berhak mendiskualifikasi peserta yang dianggap melakukan kecurangan, misalnya: memanipulasi data poin yang didapat di leaderboard
            </li>
            <li class="list-policy mb-3">
                Pemenang utama dan pemenang mingguan tidak diperbolehkan berasal dari internal PT Astra Honda Motor dan pihak yang bekerja sama dengan PT Astra Honda Motor
            </li>
            <li class="list-policy mb-3">
                Keputusan panitia tidak bisa diganggu gugat
            </li>
        </ol>
    </p>
    <div class="mt-4">
        <center><a href="{{ url('home') }}" class="btn w-50">HOME</a></center>
    </div>
</div>
@endsection
