<?php

namespace Database\Seeders;

use App\Models\Interval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interval::create([
            'title' => 'interval 1',
            'start_date' => '2025-12-28',
            'end_date' => '2025-12-30',
            'repeat' => true,
            'routine_id' => 1,
        ]);
        Interval::create([
            'title' => 'interval 2',
            'start_date' => '2025-12-20',
            'end_date' => '2025-12-29',
            'repeat' => true,
            'routine_id' => 2,
        ]);
    }
}
