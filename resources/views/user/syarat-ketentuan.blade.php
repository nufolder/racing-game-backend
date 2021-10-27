@extends('layouts.app-user')

@section('title')
<title>Profile</title>
@endsection

@section('content')
<div class="container p-3 bg-red mw-600 dashboard pb-5 minh">

    <center><img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid py-4 mt-3"></center>
    <h1 class="text-center mt-3 text-white">Syarat & Ketentuan</h1>
    <p class="privacy-policy">
        <ol class="content">
            <h6 class="list-policy">Persyaratan Umum</h6>
            <ol>
                <li class="list-policy mb-3">
                    Kompetisi permainan ini terbuka untuk umum.
                </li>
                <li class="list-policy mb-3">
                    Tidak ada biaya apapun untuk mengikuti kompetisi permainan ini.
                </li>
                <li class="list-policy mb-3">
                    Kompetisi permainan ini tidak berlaku untuk karyawan dan atau anggota keluarga dari agensi PT. Astra Honda Motor.
                </li>
                <li class="list-policy mb-3">
                    Peserta diwajibkan memfollow akun Instagram <a href="https://www.instagram.com/astrahondaracingteam/" target="_blank" style="color: #ffc210;">@astrahondaracingteam</a>
                </li>
            </ol>
            <h6 class="list-policy">Mekanisme</h6>
            <ol>
                <li class="list-policy mb-3">
                    Peserta wajib mendaftarkan diri berupa nama, nomor handphone dan alamat email sebelum mengikuti kompetisi permainan
                </li>
                <li class="list-policy mb-3">
                    Kompetisi ini mewajibkan peserta mengikuti permainan Generasi Juara  yang telah disediakan panitia pada situs generasijuara.com
                </li>
                <li class="list-policy mb-3">
                    Peserta akan mengikuti kompetisi permainan dengan “fuel” sebagai kesempatan bermain per harinya  dan mengumpulkan tiket sebagai syarat mengikuti undian grand prize  1 unit Honda CBR150R.
                </li>
                <li class="list-policy mb-3">
                    Peserta bisa mendapatkan hadiah mingguan berupa uang elektronik sebesar @ Rp1.000.000 bagi 4 orang pemenang yang akan ditentukan dari skor tertinggi di leaderboard mingguan.
                </li>
                <li class="list-policy mb-3">
                    Tiket undian grand prize  akan didapatkan oleh peserta setelah menyelesaikan satu sesi balapan dari permainan Generasi Juara.
                </li>
                <li class="list-policy mb-3">
                    Selain akan mendapatkan tiket, peserta dapat mengumpulkan koin saat game balapan berlangsung. Koin yang dikumpulkan dapat digunakan untuk mendapatkan karakter baru (pebalap Astra Honda Racing Team).
                </li>
                <li class="list-policy mb-3">
                    Dengan mendapatkan karakter baru, peserta berkesempatan untuk dapat lebih banyak tiket sehingga memperbesar peluang mendapatkan hadiah utama.
                </li>
            </ol>
            <h6 class="list-policy">Hadiah Mingguan</h6>
            <ol>
                <li class="list-policy mb-3">
                    Setiap minggunya akan ada 4 (empat) orang peserta yang berkesempatan memenangkan uang elektronik sebesar @Rp 250.000 yang akan dikirimkan melalui nomor hp peserta yang didaftarkan. Peserta hanya bisa memenangkan hadiah mingguan sebanyak satu kali.
                </li>
            </ol>
            <h6 class="list-policy">Hadiah Utama</h6>
            <ol>
                <li class="list-policy mb-3">
                    Pemenang hadiah utama akan ditentukan melalui undian tiket yang telah dikumpulkan peserta. Pemenang hadiah utama akan mendapatkan satu unit Honda CBR150R tipe CBS.
                </li>
            </ol>
            <h6 class="list-policy">Disclaimer</h6>
            <ol>
                <li class="list-policy mb-3">
                    Nama yang digunakan peserta tidak mengandung unsur pornografi, SARA
                </li>
                <li class="list-policy mb-3">
                    PT Astra Honda Motor dibebaskan dari tuntutan pihak ketiga dan konsekuensi hukum apapun terhadap materi desain yang ditampilkan di dalam permainan.
                </li>
                <li class="list-policy mb-3">
                    Dengan mengakses generasijuara.com, Anda menyetujui Ketentuan Penggunaan ini. Jika Anda tidak setuju dengan Ketentuan Penggunaan ini, mohon untuk tidak mengakses generasijuara.com.
                </li>

                <li class="list-policy mb-3">
                    Kami berhak, atas kebijakannya sendiri, untuk memodifikasi, mengubah, menambah atau menghapus bagian dari Ketentuan Penggunaan ini kapan saja tanpa pemberitahuan. Mengakses generasijuara.com yang berkelanjutan akan menandakan bahwa Anda menerima adanya perubahan pada Ketentuan Penggunaan ini.
                </li>
                <li class="list-policy mb-3">
                    Dalam keadaan apa pun kami tidak akan bertanggung jawab kepada pihak mana pun atas kerugian langsung, tidak langsung, atau konsekuensi lainnya atas mengakses generasijuara.com.
                </li>

                <li class="list-policy mb-3">
                    Informasi pribadi yang disimpan akan dihapus menggunakan langkah-langkah teknis. Penyimpanan informasi pribadi diperlukan untuk memenuhi persyaratan peraturan, mencegah penipuan , curang atau menyalahgunakan, atau menegakkan Kebijakan Privasi ini atau perjanjian lain yang mungkin kami miliki dengan pengguna.
                </li>

                <li class="list-policy mb-3">
                    Dengan mengikuti kompetisi permainan Generasi Juara, peserta wajib berlangganan newsletter racing AHM.
                </li>

                <li class="list-policy mb-3">
                    Kami tidak memiliki atau mengontrol produk atau layanan pihak ketiga ini dan tidak bertanggung jawab atau bertanggung jawab atas keakuratan atau kontennya.
                </li>

                <li class="list-policy mb-3">
                    Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang persyaratan penggunaan atau kebijakan privasi kami, jangan ragu untuk menghubungi kami melalui email di (insert email)
                </li>

                <li class="list-policy mb-3">
                    PT Astra Honda Motor berhak mendiskualifikasi peserta yang dianggap melakukan kecurangan, misalnya: memanipulasi data poin yang didapat di leaderboard.
                </li>
                <li class="list-policy mb-3">
                    Keputusan panitia tidak bisa diganggu gugat.
                </li>
                <li class="list-policy mb-3">
                    PT Astra Honda Motor berhak mengubah syarat dan ketentuan yang berlaku jika diperlukan.
                </li>
            </ol>
            <h6 class="list-policy">Periode Kompetisi & Hadiah</h6>
            <ol>
                <li class="list-policy mb-3">
                    Periode: 10 November - 10 Desember 2021
                </li>
                <li class="list-policy mb-3">
                    Pengumuman pemenang mingguan akan diumumkan setiap awal pekan melalui situs generasijuara.com setiap pekannya
                </li>
                <li class="list-policy mb-3">
                    Pemenang hadiah utama akan diumumkan setelah diundi di akhir periode 10 Desember)
                </li>
                <li class="list-policy mb-3">
                    Pemenang Hadiah Utama (1 unit CBR150R tipe CBS, Varian Warna: Honda Racing Red) untuk 1 orang pemenang.
                </li>
                <li class="list-policy mb-3">
                    Juara mingguan (Uang elektronik sebesar Rp 250.000 ) untuk 4 (empat) orang pemenang
                </li>
            </ol>
        </ol>
    </p>
    <div class="mt-4">
        <center><a href="{{ url('home') }}" class="btn w-50">HOME</a></center>
    </div>
</div>
@endsection
