<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirCraftTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('air_craft_types')->insert([
            'type' => 'emergency'
        ]);
        DB::table('air_craft_types')->insert([
            'type' => 'vip'
        ]);
        DB::table('air_craft_types')->insert([
            'type' => 'passenger'
        ]);
        DB::table('air_craft_types')->insert([
            'type' => 'cargo'
        ]);
    }
}
