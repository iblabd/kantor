<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

class KaryawanFactory extends Factory
{
    protected $model = Karyawan::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '0',
            'nama' => $this->faker->name($gender = 'male'),
            'tanggalLahir' => '2000-01-01',
            'jenisKelamin' => 'Laki-laki',
            'telephone' => $this->faker->phoneNumber(),
            'RiwayatPendidikan' => 'Sarjana',
            'Jabatan' => $this->faker->jobTitle(),
            'email' => $this->faker->unique()->safeEmail(),
            'kota' => 'Bandung',
            'Provinsi' => 'Jawa Barat'
        ];
    }
}
