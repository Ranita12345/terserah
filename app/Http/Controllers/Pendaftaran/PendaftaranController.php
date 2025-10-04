<?php

namespace App\Http\Controllers\Pendaftaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class PendaftaranController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function index()
    {
        return view('pendaftaran');
    }

    public function store(Request $request){
        // Validasi data yang diterima dari form
        $request->validate([
            'namalengkap' => 'required|string|max:255',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'pendidikansebelum' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'jeniskelamin' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'akta' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'ijazah' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'fotoktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'namaortu' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
        ]);

        // Mengupload image dan menyimpan nama file
        $fotoName = null; // Inisialisasi variabel fotoName
        if ($request->hasFile('image')) {
            // Mendapatkan nama file yang unik
            $fotoName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Simpan file di storage dengan path yang tepat
            $path = $request->file('image')->storeAs('', $fotoName, 'public');

            // Debugging: cek apakah file disimpan
            if (!$path) {
                return back()->with('error', 'Gambar gagal disimpan!');
            }
        }

        $kkName = null;
        $aktaName = null;
        $ijazahName = null;
        $fotoktpName = null;

        if ($request->hasFile('kk')) {
            $kkName = time() . '_kk_' . $request->file('kk')->getClientOriginalName();
            $kkPath = $request->file('kk')->storeAs('', $kkName, 'public');
            if (!$kkPath) {
                return back()->with('error', 'KK gagal disimpan!');
            }
        }

        if ($request->hasFile('akta')) {
            $aktaName = time() . '_akta_' . $request->file('akta')->getClientOriginalName();
            $aktaPath = $request->file('akta')->storeAs('', $aktaName, 'public');
            if (!$aktaPath) {
                return back()->with('error', 'Akta gagal disimpan!');
            }
        }

        if ($request->hasFile('ijazah')) {
            $ijazahName = time() . '_ijazah_' . $request->file('ijazah')->getClientOriginalName();
            $ijazahPath = $request->file('ijazah')->storeAs('', $ijazahName, 'public');
            if (!$ijazahPath) {
                return back()->with('error', 'Ijazah gagal disimpan!');
            }
        }

        if ($request->hasFile('fotoktp')) {
            $fotoktpName = time() . '_fotoktp_' . $request->file('fotoktp')->getClientOriginalName();
            $fotoktpPath = $request->file('fotoktp')->storeAs('', $fotoktpName, 'public');
            if (!$fotoktpPath) {
                return back()->with('error', 'FotoKtp gagal disimpan!');
            }
        }

        // Menyimpan data pendaftaran ke dalam database
        Student::create([
            'namalengkap' => $request->namalengkap,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'alamat' => $request->alamat,
            'pendidikansebelum' => $request->pendidikansebelum,
            'email' => $request->email,
            'jeniskelamin' => $request->jeniskelamin,
            'image' => $fotoName,
            'kk' => $kkName, // Menyimpan nama file
            'akta' => $aktaName, // Menyimpan nama file
            'ijazah' => $ijazahName, // Menyimpan nama file
            'fotoktp' => $fotoktpName, // Menyimpan nama file
            'namaortu' => $request->namaortu,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan!');
    }
}
