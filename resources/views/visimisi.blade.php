@extends('layouts.app')

@section('content')
    <!-- MAIN SECTION -->
    <article class="container mt-28">
      <h1
        class="text-xneutral-400 font-montserrat text-xl sm:text-2xl font-semibold"
      >
        Visi & Misi
      </h1>
      <p
        class="text-xneutral-200 text-sm sm:text-base font-montserrat font-semibold"
      >
        Bersama mengembangkan pendidikan Negeri
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">
        <div class="space-y-3">
          <h3
            class="font-montserrat text-base sm:text-lg font-semibold text-primary-200 text-center"
          >
            VISI
          </h3>
          <p
            class="text-lg sm:text-xl font-semibold font-montserrat text-xneutral-200 text-center uppercase"
          >
            {!! $visi ?? '"No Data Available"' !!}
          </p>
        </div>
        <div class="space-y-3">
          <h2
            class="font-montserrat text-base sm:text-lg font-semibold text-primary-200 text-center"
          >
            MISI
          </h2>
          <ol
            class="list-decimal pl-4 font-montserrat font-semibold text-xneutral-200 text-sm sm:text-base text-justify"
          >
            {!! $misi ?? '"No Data Available"' !!}
          </ol>
        </div>
      </div>

      <div
        class="grid grid-cols-1 sm:grid-cols-3 mt-10 border border-xneutral-100 rounded-2xl overflow-hidden"
      >
        <div class="p-[30px]">
          <h2
            class="text-base sm:text-lg font-semibold text-xneutral-400 font-montserrat"
          >
          Berkarakter
          </h2>
          <p
            class="font-montserrat font-medium mt-4 text-xneutral-200 text-xs sm:text-sm"
          >
          Sekolah menanamkan budaya 7S dan 9K, membangun kepedulian sosial, cinta budaya lokal, serta menjalin kerja sama dengan orang tua dan masyarakat. Karakter siswa dibentuk melalui lingkungan yang aman, tertib, dan penuh keteladanan.
          </p>
        </div>
        <div>
            @if(isset($visimisiImg[0]))
                <img src="{{ asset('storage/'. $visimisiImg[0]) }}" alt="Inovatif" />
            @else
                <p>No Image Available</p>
            @endif
        </div>
        <div class="p-[30px]">
          <h2
            class="text-base sm:text-lg font-semibold text-xneutral-400 font-montserrat"
          >
            Qurani
          </h2>
          <p
            class="font-montserrat font-medium mt-4 text-xneutral-200 text-xs sm:text-sm"
          >
          SDTQQA membentuk generasi yang cinta dan hafal Al-Qur’an, membiasakan ibadah, adab Islami, serta menanamkan nilai-nilai Imtaq dalam setiap aspek pembelajaran. Lingkungan sekolah dibangun untuk mendukung kebiasaan ibadah, akhlak mulia, dan karakter Islami yang kuat.
          </p>
        </div>
        <div>
            @if(isset($visimisiImg[1]))
                <img src="{{ asset('storage/'. $visimisiImg[1]) }}" alt="Inovatif" />
            @else
                <p>No Image Available</p>
            @endif
        </div>
        <div class="p-[30px]">
          <h2
            class="text-base sm:text-lg font-semibold text-xneutral-400 font-montserrat"
          >
            Unggul
          </h2>
          <p
            class="font-montserrat font-medium mt-4 text-xneutral-200 text-xs sm:text-sm"
          >
          Berprestasi dalam akademik dan non-akademik dengan pendekatan TPACK, bimbingan efektif, serta program pengembangan minat dan bakat. Siswa didorong untuk memiliki daya juang tinggi, kompetitif secara sehat, dan adaptif terhadap perubahan zaman.
          </p>
        </div>
        <div>
            @if(isset($visimisiImg[2]))
                <img src="{{ asset('storage/'. $visimisiImg[2]) }}" alt="Inovatif" />
            @else
                <p>No Image Available</p>
            @endif
        </div>
      </div>
    </article>
@endsection
