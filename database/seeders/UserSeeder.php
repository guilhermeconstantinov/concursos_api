<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Admin teste',
                'email' => 'admin@mail.com',
                'last_name' => 'Teste',
                'birthdate' => '2000-01-01',
                'password' => Hash::make('concurso@teste'),
            ],
            [
                'name' => 'Leandro',
                'email' => 'ze@mail.com',
                'last_name' => 'Teste',
                'birthdate' => '2000-01-01',
                'password' => Hash::make('concurso@teste'),
            ],
            [
                'name' => 'Guilherme',
                'email' => 'Guilherme@mail.com',
                'last_name' => 'Teste',
                'birthdate' => '2000-01-01',
                'password' => Hash::make('gui@teste'),
            ],
        ]);
    }

    public function create($users)
    {
        foreach ($users as $item) {
            $user = user::where('email', $item['email'])->first();
            if ($user) {
                continue;
            }
            $user = User::create($item);
        }
    }
}
