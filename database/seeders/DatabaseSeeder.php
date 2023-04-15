<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tarefa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Tarefa::factory()->count(50)->create();

        $tarefas = Tarefa::all();

        User::all()->each(function ($user) use ($tarefas) {
            $user->tarefas()->attach(
                $tarefas->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

    }
}
