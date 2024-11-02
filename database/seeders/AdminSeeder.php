<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::factory()->count(5)->create();

        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
