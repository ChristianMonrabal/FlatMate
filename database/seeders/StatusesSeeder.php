<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            // Ads
            ['name' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'closed', 'created_at' => now(), 'updated_at' => now()],

            // Applications
            ['name' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'accepted', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'rejected', 'created_at' => now(), 'updated_at' => now()],

            // Contracts
            ['name' => 'draft', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'signed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'cancelled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
