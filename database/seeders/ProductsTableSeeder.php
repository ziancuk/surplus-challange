<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Salad Buah',
                'description' => 'Salad buah adalah makanan sehat',
                'enable' => 1,
                'created_at' => '2023-06-06 02:48:21',
                'updated_at' => '2023-06-06 02:50:22',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kopi Hitam',
                'description' => 'Kopi Hitam adalah minuman',
                'enable' => 1,
                'created_at' => '2023-06-06 02:50:49',
                'updated_at' => '2023-06-06 02:50:49',
            ),
        ));
        
        
    }
}