<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AirCraftSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('air_craft_sizes')->insert([
            'size' => 'small'
        ]);
        DB::table('air_craft_sizes')->insert([
            'size' => 'large'
        ]);

    }
}
