<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->string('nama');
            $table->date('tanggalLahir')->nullable();
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('riwayatPendidikan', ['Sarjana', 'D1, D2, D3', 'SMA/SMK', 'Lainnya...'])->nullable();
            $table->string('jabatan')->nullable();
            $table->string('telephone');
            $table->string('email');
            $table->string('alamat')->nullable();
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('pos')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('karyawans');
    }
}
