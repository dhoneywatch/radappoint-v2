<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RadiologistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('radiologists')->insert([
            'name' => 'Radiologist Support',
            'email' => 'radiologist@gmail.com',
            'password' => Hash::make('radiologist123'),
        ]);

        DB::table('radiologists')->insert([
            'name' => 'Ma. Anna Carigaba',
            'email' => 'macarigaba@gmail.com',
            'password' => Hash::make('macarigaba123'),
        ]);

        DB::table('radiologists')->insert([
            'name' => 'Loisse Clare Melon',
            'email' => 'lcmelon@gmail.com',
            'password' => Hash::make('lcmelon123'),
        ]);

        DB::table('radiologists')->insert([
            'name' => 'John Eron Salongsongan',
            'email' => 'jesalongsongna@gmail.com',
            'password' => Hash::make('jesalongsongan123'),
        ]);

        DB::table('radiologists')->insert([
            'name' => 'Emmanuel Ednalan',
            'email' => 'eednalan@gmail.com',
            'password' => Hash::make('eednalan123'),
        ]);

        DB::table('radiologists')->insert([
            'name' => 'Seth Jared Saluta',
            'email' => 'sjsaluta@gmail.com',
            'password' => Hash::make('sjsaluta123'),
        ]);
    }
}
