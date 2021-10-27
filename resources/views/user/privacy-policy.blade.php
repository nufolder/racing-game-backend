@extends('layouts.app-user')

@section('title')
<title>Profile</title>
@endsection

@section('content')
<div class="container p-3 bg-red mw-600 dashboard pb-5 minh">

    <center><img src="{{ asset('images/logo-generasi-juara.png') }}" class="img-fluid py-4 mt-3"></center>
    <h1 class="text-center mt-3 text-white">Kebijakan Privasi</h1>
    <p class="privacy-policy">
        <ol class="content">
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
                Informasi pribadi yang disimpan dalam akan dihapus menggunakan langkah-langkah teknis. Penyimpanan informasi pribadi diperlukan untuk memenuhi persyaratan peraturan, mencegah penipuan , curang atau menyalahgunakan, atau menegakkan Kebijakan Privasi ini atau perjanjian lain yang mungkin kami miliki dengan pengguna.
            </li>
            <li class="list-policy mb-3">
                Kami tidak memiliki atau mengontrol produk atau layanan pihak ketiga ini dan tidak bertanggung jawab atau bertanggung jawab atas keakuratan atau kontennya.
            </li>
            <li class="list-policy mb-3">
                Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang persyaratan penggunaan atau kebijakan privasi kami, jangan ragu untuk menghubungi kami melalui email di <a href="mailto:help@generasijuara.com" target="_blank" style="color: #ffc210;">help@generasijuara.com</a>
            </li>
        </ol>
    </p>
    <div class="mt-4">
        <center><a href="{{ url('home') }}" class="btn w-50">HOME</a></center>
    </div>
</div>
@endsection
