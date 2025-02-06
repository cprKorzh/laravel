<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['title' => 'Программирование'],
            ['title' => 'Тестирование'],
            ['title' => 'Безопасность'],
        ];

        DB::table('sections')->insert($sections);
    }
}
