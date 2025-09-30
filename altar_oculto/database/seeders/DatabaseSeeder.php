<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;

class DatabaseSeeder extends Seeder
{
    // EXECUTA TODOS OS SEEDERS
    public function run()
    {
        // Usuários
        // User::factory(10)->create(); // cria 10 usuários de teste

        // Categorias
        // Categoria::factory(5)->create(); // cria 5 categorias de teste

        // Produtos
        // Produto::factory(20)->create(); // cria 20 produtos de teste
    }
}
