<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class; // define o modelo que a factory cria

    // DADOS FALSOS PARA TESTE
    public function definition()
    {
        return [
            'name' => $this->faker->name, // nome aleatório
            'email' => $this->faker->unique()->safeEmail, // email único
            'password' => bcrypt('123456'), // senha padrão criptografada
            'tipo' => $this->faker->randomElement(['cliente','admin']), // tipo aleatório
            'remember_token' => Str::random(10), // token aleatório
        ];
    }
}
