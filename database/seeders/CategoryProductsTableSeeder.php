<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category_products')->delete();
        
        \DB::table('category_products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-06-06 03:02:19',
                'updated_at' => '2023-06-06 03:02:19',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-06-06 03:02:45',
                'updated_at' => '2023-06-06 03:04:23',
            ),
            2 => 
            array (
                'id' => 4,
                'product_id' => 2,
                'category_id' => 2,
                'created_at' => '2023-06-06 03:08:05',
                'updated_at' => '2023-06-06 03:08:05',
            ),
            3 => 
            array (
                'id' => 5,
                'product_id' => 2,
                'category_id' => 1,
                'created_at' => '2023-06-06 03:08:08',
                'updated_at' => '2023-06-06 03:08:08',
            ),
        ));
        
        
    }
}