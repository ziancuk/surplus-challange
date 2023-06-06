<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 2,
                'image_id' => 1,
                'created_at' => '2023-06-06 05:23:05',
                'updated_at' => '2023-06-06 05:23:05',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'image_id' => 1,
                'created_at' => '2023-06-06 05:23:39',
                'updated_at' => '2023-06-06 05:23:39',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 2,
                'image_id' => 2,
                'created_at' => '2023-06-06 05:24:05',
                'updated_at' => '2023-06-06 05:24:05',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 1,
                'image_id' => 2,
                'created_at' => '2023-06-06 06:14:46',
                'updated_at' => '2023-06-06 06:14:46',
            ),
        ));
        
        
    }
}