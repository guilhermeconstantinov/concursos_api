<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsSeeder extends Seeder
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
                'name' => 'Progressão Geométrica',
                'discipline_id' => 1
            ],
            [
                'name' => 'Orações Subordinadas',
                'discipline_id' => 2
            ],
            [
                'name' => 'Ótica',
                'discipline_id' => 3
            ],
        ]);
    }

    public function create($topics)
    {
        foreach ($topics as $item) {
            $topic = Topic::where('name', $item['name'])->first();
            if ($topic) {
                continue;
            }
            $topic = Topic::create($item);
        }
    }
}
