<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $path = 'database/dump/words.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Words table seeded!');
    }
}
