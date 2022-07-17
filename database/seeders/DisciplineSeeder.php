<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create([
            [
                'name' => 'Matemática',
            ],
            [
                'name' => 'Português',
            ],
            [
                'name' => 'Física',
            ],
        ]);
    }

    public function create($topics)
    {
        foreach ($topics as $item) {
            $discipline = Discipline::where('name', $item['name'])->first();
            if ($discipline) {
                continue;
            }
            $discipline = Discipline::create($item);
        }
    }
}
