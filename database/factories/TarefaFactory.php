<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Tarefa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TarefaFactory extends Factory
{

    protected $model = Tarefa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'descricao' => $this->faker->sentence($nbWords = 15, $variableNbWords = true),
            'data_limite_conclusao' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '1 years', $timezone = null)
        ];
    }
}
