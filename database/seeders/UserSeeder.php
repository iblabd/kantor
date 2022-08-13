<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now()
        ]);

        $admin->assignRole('admin');

        $admin = Karyawan::create([
            'nama' => 'Admin',
            'tanggalLahir' => '2000-01-01',
            'jenisKelamin' => 'Laki-laki',
            'telephone' => '831000000000',
            'jabatan' => 'Admin',
            'riwayatPendidikan' => 'Sarjana',
            'email' => 'admin@example.com',
            'alamat' => 'Jl. Kebon Kacang',
            'kelurahan' => 'Kebon Kacang',
            'kecamatan' => 'Kebon Kacang',
            'rt' => '001',
            'rw' => '002',
            'pos' => '12345',
            'kota' => 'Kota Bandung',
            'provinsi' => 'Jawa Barat'
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user123'),
        ]);

        $user->assignRole('user');

        $user = Karyawan::create([
            'nama' => 'User',
            'tanggalLahir' => '2000-01-01',
            'jenisKelamin' => 'Laki-laki',
            'telephone' => '831000000000',
            'jabatan' => 'User',
            'riwayatPendidikan' => 'Sarjana',
            'email' => 'user@example.com',
            'alamat' => 'Jl. Kebon Kacang',
            'kelurahan' => 'Kebon Kacang',
            'kecamatan' => 'Kebon Kacang',
            'rt' => '001',
            'rw' => '002',
            'pos' => '12345',
            'kota' => 'Kota Bandung',
            'provinsi' => 'Jawa Barat'
        ]);
    }
}
