<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
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
                'wording' => '<div class="my-8">
                    <h2 class="text-xl font-medium mb-2">Questão 1</h2>
                    <div class="space-y-4">
                    <p>
                        Um professor pediu aos seus alunos que esboçassem um gráfico
                        representando a relação entre metro cúbico e litro, utilizando um
                        software. Pediu ainda que representassem graficamente os pontos
                        correspondentes às transformações de 0 m3, 2 m3 e 4 m3 em litro. O
                        professor recebeu de cinco alunos os seguintes gráficos:
                    </p>
                    <img src="/_nuxt/assets/img/9b043ead21d24dab3643.png" class="mx-auto">
                    </div>
                    <p class="mt-5">
                    O gráfico que melhor representa o esboço da transformação de metro cúbico
                    para litro é o do aluno
                    </p>
                </div>',
                'alternative' => json_encode("[{'a' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'b' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'c' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'d' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'e' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }]"),
                'correct_alternative' => 'b',
                'topic_id' => 1,
                'simulations_id' => 1
            ],
            [
                'wording' => '<div class="my-8">
                    <h2 class="text-xl font-medium mb-2">Questão 1</h2>
                    <div class="space-y-4">
                    <p>
                        Um professor pediu aos seus alunos que esboçassem um gráfico
                        representando a relação entre metro cúbico e litro, utilizando um
                        software. Pediu ainda que representassem graficamente os pontos
                        correspondentes às transformações de 0 m3, 2 m3 e 4 m3 em litro. O
                        professor recebeu de cinco alunos os seguintes gráficos:
                    </p>
                    <img src="/_nuxt/assets/img/9b043ead21d24dab3643.png" class="mx-auto">
                    </div>
                    <p class="mt-5">
                    O gráfico que melhor representa o esboço da transformação de metro cúbico
                    para litro é o do aluno
                    </p>
                </div>',
                'alternative' => json_encode("[{'a' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'b' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'c' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'d' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'e' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }]"),
                'correct_alternative' => 'b',
                'topic_id' => 1,
                'simulations_id' => 1
            ],
            [
                'wording' => '<div class="my-8">
                    <h2 class="text-xl font-medium mb-2">Questão 1</h2>
                    <div class="space-y-4">
                    <p>
                        Um professor pediu aos seus alunos que esboçassem um gráfico
                        representando a relação entre metro cúbico e litro, utilizando um
                        software. Pediu ainda que representassem graficamente os pontos
                        correspondentes às transformações de 0 m3, 2 m3 e 4 m3 em litro. O
                        professor recebeu de cinco alunos os seguintes gráficos:
                    </p>
                    <img src="/_nuxt/assets/img/9b043ead21d24dab3643.png" class="mx-auto">
                    </div>
                    <p class="mt-5">
                    O gráfico que melhor representa o esboço da transformação de metro cúbico
                    para litro é o do aluno
                    </p>
                </div>',
                'alternative' => json_encode("[{'a' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'b' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'}, {'c' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'d' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }, {'e' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.' }]"),
                'correct_alternative' => 'b',
                'topic_id' => 1,
                'simulations_id' => 1
            ],
        ]);
    }

    public function create($questions)
    {
        foreach ($questions as $item) {
            $question = Questions::create($item);
        }
    }
}
