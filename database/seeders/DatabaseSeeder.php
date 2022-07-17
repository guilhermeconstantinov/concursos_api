<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Questions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SimulationSeeder::class,
            DisciplineSeeder::class,
            TopicsSeeder::class,
            QuestionsSeeder::class
        ]);
    }
}
