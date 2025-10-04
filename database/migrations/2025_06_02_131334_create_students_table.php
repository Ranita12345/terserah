<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap', 255);
            $table->string('tempatlahir', 255);
            $table->date('tanggallahir');
            $table->string('alamat', 255);
            $table->string('pendidikansebelum', 255);
            $table->string('namaortu', 255);
            $table->string('email', 255);
            $table->string('nomor_hp', 15);
            $table->string('jeniskelamin', 255);
            $table->text('image');
            $table->text('kk');
            $table->text('akta');
            $table->text('ijazah');
            $table->text('fotoktp');
            $table->enum('status_verifikasi', ['pending', 'valid', 'invalid'])->default('pending');
            $table->text('catatan')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->string('nis')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
