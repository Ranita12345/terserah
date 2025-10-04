@extends('layouts.app')
@section('content')

    <!-- MAIN SECTION -->
    <article class="container mt-28">
      <h1
        class="text-xneutral-400 font-montserrat text-xl sm:text-2xl font-semibold"
      >
        Sejarah Pondok Pesantren Nawwir Quluubanaa
      </h1>
      <p
        class="text-xneutral-200 font-montserrat text-sm sm:text-base font-semibold"
      >
        Bersama mengembangkan pendidikan Negeri
      </p>

        @if ($historys->isEmpty())
            <div class="text-center text-xneutral-300 font-montserrat font-medium text-sm sm:text-base">
                Pondok pesantren nawwir quluubanaa merupakan cabang dari PPTQ Al-Asy’ariyyah yang beralamat di Kalibeber Wonosobo. PPTQ Al-Asy’ariyyah mengalami 4 periode kepemimpinan. Salah satunya yaitu simbah KH. Muntaha al-Hafidz bin KH. Asy’ari atau yang biasa disebut dengan Mbah Mun. dalam mengembangkan Pondok Pesantren ini, Mbah Mun didamnpingi oleh saudaranya yaitu Simbah KH. Mustahal Asy’ari atau yang sering disebut dengan Mbah Mus. Pada tahun 1958 beliau melaksanakan sunnah Nabi Saw yaitu melangsungkan pernikahan dengan Nyai Tisfiyyah dari Kertijayan, Buaran, Pekalongan. Dari pernikahan tersebut, beliau dikaruniai 6 orang putra, yaitu Mustaqimah Asy’ari, Mas’udan Asy’ari, Atho’illah Asy’ari, Mukarromah, Muhammad Mukhlis, dan Affan Mastur.
                Salah satu putra Mbah Mus yaitu abah KH. Mas’udan Asy’ari menikah dengan seorang santri putri Al-Asy’ariyyah yaitu Ibu Nyai Hj. Nurul Azizah dari Ngawi, Jawa Timur. Kemudian beliau bersama istrinya mendirikan asrama khusus Mahasiswa putri pada tahun 2004 yang bernama Asrama Khoirunnisa. Pada awalnya hanya ada 2 santri yang mukim. Semakin bertambahnya tahun, Santri yang mukim semakin banyak dan pada tahun 2007 berganti nama menjadi MT. Nawwir Quluubanaa. Tahun 2017 MT. Nawwir Quluubanaa beralih menjadi PPTQ Al-Asy’ariyyah Komplek Nawwir Quluubanaa. Karena letaknya dekat dengan kampus UNSIQ, maka banyak mahasiswa yang berminat mendaftar di Pondok Pesantren Nawwir Quluubanaa.
            </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-8 mt-8">
            @foreach ($historys as $history)
            <div class="w-full h-[600px] sm:col-span-5 relative overflow-hidden rounded-[30px]">
                <img
                src="{{ asset('storage/' . $history->image) }}"
                alt="Sejarah PPTQ Nawwir Quluubanaa"
                class="absolute inset-0 w-full h-full object-contain object-center rounded-[30px]"
                />
            </div>
            <div
            class="font-montserrat font-medium text-sm sm:text-base text-justify sm:col-span-7 text-xneutral-300"
            >
                {!! $history->content !!}
            </div>
            @endforeach
        </div>
        @endif
    </article>

@endsection
