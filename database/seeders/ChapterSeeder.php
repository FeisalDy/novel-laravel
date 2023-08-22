<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Novel;
use App\Models\Chapter;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $novels = Novel::all();

        foreach ($novels as $novel) {
            Chapter::factory()->count(10)->create(['novel_id' => $novel->id]);
        }
    }
}
