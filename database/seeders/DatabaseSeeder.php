<?php

namespace Database\Seeders;

use App\Models\Projeto;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        {
            // Cria um projeto
            $projeto = Projeto::create([
                'nome' => 'Projeto Natação',
            ]);

            // Cria um usuário associado ao projeto
            User::factory()->create([
                'projeto_id' => $projeto->id,
                'nome' => 'Jonisson',
                'email' => 'jonisson@teste.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
