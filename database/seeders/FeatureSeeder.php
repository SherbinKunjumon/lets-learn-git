<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$features= [
        ["featurename" => "washable","featurevalue"=>"1"],
        ["featurename" => "cotton material","featurevalue"=>"0"],
        ["featurename" => "durable","featurevalue"=>"2"],
        ["featurename" => "xxl","featurevalue"=>"3"]
];

    DB::table('features')->insert($features); 
}
}
