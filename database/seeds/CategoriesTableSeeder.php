<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
        	'name' => 'Environment'
        ]);

         App\Category::create([
        	'name' => 'Pollution'
        ]);

          App\Category::create([
        	'name' => 'Nature'
        ]);

           App\Category::create([
        	'name' => 'Technology'
        ]);
    }
}
