<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            'room' => '30001',
        ]);
        DB::table('rooms')->insert([
            'room' => '30002',
        ]);
        DB::table('rooms')->insert([
            'room' => '30003',
        ]);
        DB::table('rooms')->insert([
            'room' => '30004',
        ]);
        DB::table('rooms')->insert([
            'room' => '30005',
        ]);
        DB::table('rooms')->insert([
            'room' => '30006',
        ]);
        DB::table('rooms')->insert([
            'room' => '30007',
        ]);

    }
}
