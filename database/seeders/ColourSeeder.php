<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colours= [
            ["colourname" => "red"],
            ["colourname" => "brown"],
            ["colourname" => "black"]
        ];
        DB::table('colours')->insert($colours);
}
}