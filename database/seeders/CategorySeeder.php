<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $categories= [
            ["categoryname" => "kids"],
            ["categoryname" => "mens"],
            ["categoryname" => "womens"]
            
];
 
        DB::table('categories')->insert($categories);
 
 
        
    }
}
