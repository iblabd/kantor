<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => fake()->name($gender = null|'male'),
            'tanggalLahir' => '2000-01-01',
            'jenisKelamin' => 'Laki-laki',
            'RiwayatPendidikan' => 'Lainnya..',
            'Jabatan' => fake()->jobTitle(),
            'email' => fake()->unique()->safeEmail(),
            'kota' => 'Bandung',
            'Provinsi' => 'Jawa Barat',
        ];
    }
}
