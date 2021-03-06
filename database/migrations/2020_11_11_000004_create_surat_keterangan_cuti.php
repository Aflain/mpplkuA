<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Surat Keterangan Cuti Mahasiswa
class CreateSuratKeteranganCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keterangan_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat')->default('Surat Keterangan Cuti');
            $table->string('status_surat')->default('Pending');
            $table->text('alasan_penolakan')->nullable();
            $table->integer('waktuCuti_TahunAkademik');
            $table->string('waktuCuti_Semester');
            $table->text('alasanCuti');

            $table->string('fileSuratPengajuanMahasiswa');
            $table->string('fileSuratPengantarDept');
            $table->string('fileSuratKeteranganDokter');

            $table->bigInteger('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keterangan_cuti');
    }
}
