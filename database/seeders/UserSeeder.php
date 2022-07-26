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
        ]);

        $admin->assignRole('admin');

        $admin = Karyawan::create([
            'nama' => 'Admin',
            'tanggalLahir' => '2000-01-01',
            'jenisKelamin' => 'Laki-laki',
            'telephone' => '83144791501',
            'RiwayatPendidikan' => 'Sarjana',
            'email' => 'admin@example.com',
            'kota' => 'Bandung',
            'Provinsi' => 'Jawa Barat'
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
            'telephone' => '83144791501',
            'RiwayatPendidikan' => 'Sarjana',
            'email' => 'user@example.com',
            'kota' => 'Bandung',
            'Provinsi' => 'Jawa Barat'
        ]);
    }
}
