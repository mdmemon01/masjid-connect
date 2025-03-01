<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Masjid;

class MasjidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Masjid::create([
        'name' => 'Al-Noor Masjid',
        'location' => '123 Main St',
        'description' => 'A beautiful masjid in the heart of the city',
    ]);

    Masjid::create([
        'name' => 'Al-Falah Islamic Center',
        'location' => '456 Oak Avenue',
        'description' => 'Community center and masjid',
    ]);
}
}
