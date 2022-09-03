<?php

namespace Database\Seeders;
use App\Models\category;

use App\Models\colour;
use App\Models\feature;
use App\Models\productfeature;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { $this->call([CategorySeeder::class]);
        $this->call([ColourSeeder::class]);  
        $this->call([featureSeeder::class]); 
        $this->call([productfeatureSeeder::class]);
        // \App\Models\User::factory(10)->create();
    }
}
