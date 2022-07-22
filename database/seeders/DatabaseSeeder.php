<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(KaryawansSeeder::class);

        // Karyawan::factory(20)->create();
    }
}
