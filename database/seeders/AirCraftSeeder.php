<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirCraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aircraft')->insert([
            'name' => 'Aricraft Liberty',
            'size_id' => 1,
            'type_id' =>1,

        ]);
        DB::table('aircraft')->insert([
            'name' => 'Aricraft Thor',
            'size_id' => 2,
            'type_id' =>2,

        ]);
        DB::table('aircraft')->insert([
            'name' => 'Aricraft Hulk',
            'size_id' => 2,
            'type_id' =>3,

        ]);
        DB::table('aircraft')->insert([
            'name' => 'Aricraft Hawk',
            'size_id' => 2,
            'type_id' =>3,

        ]);

        DB::table('aircraft')->insert([
            'name' => 'Aricraft Vision',
            'size_id' => 2,
            'type_id' =>4,

        ]);

        DB::table('aircraft')->insert([
            'name' => 'Aricraft Wid',
            'size_id' => 2,
            'type_id' =>1,

        ]);
    }
}
