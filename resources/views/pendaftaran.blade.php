@extends('layouts.app')

@section('content')
    <!-- MAIN SECTION -->
    <article class="container mt-28">
        <h1 class="text-xneutral-400 font-montserrat text-xl sm:text-2xl font-semibold">
            Pendaftaran
        </h1>
        <p class="text-xneutral-200 font-montserrat text-sm sm:text-base font-semibold">
            Bergabung bersama kami untuk Masa Depan yang gemilang
        </p>

        @if (session('success'))
            <div id="alert" style="background-color: #3b82f6;" class="flex items-center text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                </svg>
                <p>{{ session('success') }}</p>
            </div>

            <script>
                // Mengatur waktu tunggu untuk menghilangkan alert
                setTimeout(function() {
                    var alert = document.getElementById('alert');
                    if (alert) {
                        alert.style.opacity = '0'; // Mengubah opasitas menjadi 0
                        alert.style.transition = 'opacity 0.5s ease'; // Menambahkan efek transisi
                        setTimeout(function() {
                            alert.style.display = 'none'; // Menghilangkan alert setelah efek transisi
                        }, 500); // Tunggu hingga transisi selesai (0.5 detik)
                    }
                }, 3000); // 3000 ms = 3 detik
            </script>
        @endif

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
            <strong class="font-bold">Ada kesalahan:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Pendaftaran -->
        <form
            action="{{ route('pendaftaran.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6 mt-[70px]"
        >
            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-12 md:gap-[124px] font-montserrat">
                <div class="space-y-10">
                    <div class="flex flex-col gap-3">
                        <label for="nama-lengkap" class="font-semibold text-sm text-xneutral-400">Nama Lengkap
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="text"
                            id="nama-lengkap"
                            name="namalengkap"
                            placeholder="Masukan Nama Lengkap Anda"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="email" class="font-semibold text-sm text-xneutral-400">Email
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukan Email Anda"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="jeniskelaminr" class="font-semibold text-sm text-xneutral-400">Jenis Kelamin
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex items-center">
                            <select
                                id="jeniskelamin"
                                name="jeniskelamin"
                                required
                                class="border w-full peer placeholder:font-semibold appearance-none placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            >
                                <option class="font-montserrat text-xneutral-300" value="Laki-laki">Laki-laki</option>
                                <option class="font-montserrat text-xneutral-300" value="Perempuan">Perempuan</option>
                            </select>
                            <i class="bi bi-chevron-down pointer-events-none -ml-8 peer-focus:rotate-180 transition-all"></i>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="tempat-lahir" class="font-semibold text-sm text-xneutral-400">Tempat Lahir
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="text"
                            id="tempat-lahir"
                            name="tempatlahir"
                            placeholder="Masukan Tempat Lahir"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="tanggallahir" class="font-semibold text-sm text-xneutral-400">Tanggal Lahir
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="date"
                            id="tanggallahir"
                            name="tanggallahir"
                            max="{{ now()->toDateString() }}"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>


                    <div class="flex flex-col gap-3">
                        <label for="alamat" class="font-semibold text-sm text-xneutral-400">Alamat
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="text"
                            id="alamat"
                            name="alamat"
                            placeholder="Masukan Alamat"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="pendidikansebelum" class="font-semibold text-sm text-xneutral-400">Pendidikan Sebelumnya
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="text"
                            id="pendidikansebelum"
                            name="pendidikansebelum"
                            placeholder="Masukkan pendidikan terakhir"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="foto" class="font-semibold text-sm text-xneutral-400">Foto
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex gap-3 items-center w-full">
                            <input
                                type="file"
                                id="foto"
                                name="image"
                                accept="image/*"
                                required
                                placeholder="Masukkan foto Anda"
                                class="border w-full file:hidden placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            />
                            <button
                                type="button"
                                class="border text-nowrap bg-primary-200 text-xneutral-0 font-semibold py-[18px] px-6 rounded-lg"
                            >
                                Upload Foto
                            </button>
                        </div>
                    </div>

                </div>

                <div class="space-y-10">
                    <div class="flex flex-col gap-3">
                        <label for="nama-ortu" class="font-semibold text-sm text-xneutral-400">Nama Orang Tua/Wali
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="text"
                            id="nama-ortu"
                            name="namaortu"
                            placeholder="Masukan Nama Panggilan Anda"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="nomor-hp" class="font-semibold text-sm text-xneutral-400">Nomor HP Orang Tua/Wali
                            <span class="text-secondary-error">*</span>
                        </label>
                        <input
                            type="tel"
                            id="nomor-hp"
                            name="nomor_hp"
                            placeholder="Masukan Nomor HP Anda"
                            required
                            class="border placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                        />
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="kk" class="font-semibold text-sm text-xneutral-400">Kartu Keluarga
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex gap-3 items-center w-full">
                            <input
                                type="file"
                                id="kk"
                                name="kk"
                                accept="image/*"
                                required
                                placeholder="Masukkan Kartu Keluarga"
                                class="border w-full file:hidden placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            />
                            <button
                                type="button"
                                class="border text-nowrap bg-primary-200 text-xneutral-0 font-semibold py-[18px] px-6 rounded-lg"
                            >
                                Upload Kartu Keluarga
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="akta" class="font-semibold text-sm text-xneutral-400">Akta Kelahiran
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex gap-3 items-center w-full">
                            <input
                                type="file"
                                id="akta"
                                name="akta"
                                accept="image/*"
                                required
                                placeholder="Masukkan Akta Kelahiran"
                                class="border w-full file:hidden placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            />
                            <button
                                type="button"
                                class="border text-nowrap bg-primary-200 text-xneutral-0 font-semibold py-[18px] px-6 rounded-lg"
                            >
                                Upload Akta
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="ijazah" class="font-semibold text-sm text-xneutral-400">Ijazah Terlegalisir
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex gap-3 items-center w-full">
                            <input
                                type="file"
                                id="ijazah"
                                name="ijazah"
                                accept="image/*"
                                required
                                placeholder="Masukkan Ijazah"
                                class="border w-full file:hidden placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            />
                            <button
                                type="button"
                                class="border text-nowrap bg-primary-200 text-xneutral-0 font-semibold py-[18px] px-6 rounded-lg"
                            >
                                Upload Ijazah
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="fotoktp" class="font-semibold text-sm text-xneutral-400">Foto KTP Orang Tua/Wali
                            <span class="text-secondary-error">*</span>
                        </label>
                        <div class="flex gap-3 items-center w-full">
                            <input
                                type="file"
                                id="fotoktp"
                                name="fotoktp"
                                accept="image/*"
                                required
                                placeholder="Masukkan Foto KTP Orang Tua/Wali"
                                class="border w-full file:hidden placeholder:font-semibold placeholder:text-xneutral-100 border-xneutral-100 py-[18px] px-6 rounded-lg"
                            />
                            <button
                                type="button"
                                class="border text-nowrap bg-primary-200 text-xneutral-0 font-semibold py-[18px] px-6 rounded-lg"
                            >
                                Upload KTP
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-12 md:gap-[124px] !mt-[60px]">
                <a
                    href="/"
                    class="px-6 py-[14px] w-full text-center font-montserrat text-neutral-0 bg-white border text-lg font-semibold border-primary-200 text-primary-200 rounded-full"
                >
                    Kembali Ke Homepage
                </a>
                <button
                    type="submit"
                    class="px-6 py-[14px] text-center w-full font-montserrat text-neutral-0 bg-primary-200 border text-lg font-semibold border-primary-200 text-xneutral-0 rounded-full"
                >
                    Daftar
                </button>
            </div>
        </form>
    </article>
    <script>
        document.querySelectorAll('button').forEach((btn) => {
            btn.addEventListener('click', function () {
                const input = this.previousElementSibling;
                if (input && input.type === 'file') {
                    input.click();
                }
            });
        });
    </script>
    
@endsection
