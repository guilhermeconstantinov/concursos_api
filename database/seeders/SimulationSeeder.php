<?php

namespace Database\Seeders;

use App\Models\Simulation;
use Illuminate\Database\Seeder;

class SimulationSeeder extends Seeder
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
                'user_id' => 6
            ]
        ]);
    }

    public function create($simulations)
    {
        foreach ($simulations as $item) {
            $simulation = Simulation::create($item);
        }
    }
}
