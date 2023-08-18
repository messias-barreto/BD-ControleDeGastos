<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusReceitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_receitas')->insert([
            ['name' => 'Deposito Dinheiro', 'description' => '', 'status' => 'deposito'],
            ['name' => 'Deposito Cartão', 'description' => '', 'status' => 'deposito'],
            ['name' => 'Deposito Pix', 'description' => '', 'status' => 'deposito'],
            ['name' => 'Saque Dinheiro', 'description' => '', 'status' => 'saque'],
            ['name' => 'Saque Cartão', 'description' => '', 'status' => 'saque']
        ]);
    }
}
