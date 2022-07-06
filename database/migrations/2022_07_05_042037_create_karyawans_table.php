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
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->date('tanggalLahir')->default('2000-01-01');
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('riwayatPendidikan', ['Sarjana', 'D1, D2, D3', 'SMA/SMK', 'Lainnya...']);
            $table->string('jabatan');
            $table->string('telephone');
            $table->string('email');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('rt');
            $table->string('rw');
            $table->string('pos');
            $table->string('file_path')->default('null');
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
