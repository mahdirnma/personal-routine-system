<?php

namespace Database\Seeders;

use App\Models\Routine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Routine::create([
            'title' => 'routine 1',
            'description' => 'lorem ipsum 1',
            'publish_date' => now(),
            'reminder_date' => '2025-12-28',
            'reminder_time' => '17:00:00',
            'status' => true,
            'category_id' => 1,
            'user_id' => 1,
        ]);
        Routine::create([
            'title' => 'routine 2',
            'description' => 'lorem ipsum 2',
            'publish_date' => now()->subDays(2),
            'reminder_date' => '2025-12-29',
            'reminder_time' => '20:00:00',
            'status' => true,
            'category_id' => 2,
            'user_id' => 2,
        ]);
    }
}
