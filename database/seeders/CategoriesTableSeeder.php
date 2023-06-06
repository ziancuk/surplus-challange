<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Food',
                'enable' => 1,
                'created_at' => '2023-06-06 02:23:21',
                'updated_at' => '2023-06-06 02:23:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Drink',
                'enable' => 1,
                'created_at' => '2023-06-06 02:25:47',
                'updated_at' => '2023-06-06 02:25:47',
            ),
        ));
        
        
    }
}