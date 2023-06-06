<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('images')->delete();
        
        \DB::table('images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Brokoli',
                'file' => '1686025470.jpg',
                'enable' => 1,
                'created_at' => '2023-06-06 03:22:46',
                'updated_at' => '2023-06-06 04:24:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Salad',
                'file' => '1686021813.jpg',
                'enable' => 1,
                'created_at' => '2023-06-06 03:23:33',
                'updated_at' => '2023-06-06 03:23:33',
            ),
        ));
        
        
    }
}