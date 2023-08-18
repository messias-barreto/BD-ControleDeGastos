<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryReceitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_receitas')->insert([
            ['name' => 'Estudo', 'description' => ''],
            ['name' => 'Lazer', 'description' => ''],
            ['name' => 'Compras', 'description' => ''],
            ['name' => 'Saúde', 'description' => ''],
            ['name' => 'Reforma', 'description' => ''],
            ['name' => 'Outros', 'description' => '']
        ]);
    }
}
