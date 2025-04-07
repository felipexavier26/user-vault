<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
            'dt_nasc' => '1990-01-01',
        ]);

        Usuario::factory()->count(5)->create(); // Se quiser gerar aleatórios (precisa da factory)
    }
}
