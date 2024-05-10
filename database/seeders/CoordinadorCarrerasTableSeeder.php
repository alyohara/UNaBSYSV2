<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoordinadorCarrerasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coordinador_carreras')->delete();
        
        \DB::table('coordinador_carreras')->insert(array (
            0 => 
            array (
                'id' => 1,
                'coordinador_id' => 1,
                'carrera_id' => 5,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            1 => 
            array (
                'id' => 2,
                'coordinador_id' => 1,
                'carrera_id' => 6,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            2 => 
            array (
                'id' => 3,
                'coordinador_id' => 1,
                'carrera_id' => 8,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            3 => 
            array (
                'id' => 4,
                'coordinador_id' => 3,
                'carrera_id' => 12,
                'created_at' => '2023-07-24 13:42:46',
                'updated_at' => '2023-07-24 13:42:46',
            ),
            4 => 
            array (
                'id' => 5,
                'coordinador_id' => 4,
                'carrera_id' => 3,
                'created_at' => '2023-07-24 14:13:15',
                'updated_at' => '2023-07-24 14:13:15',
            ),
            5 => 
            array (
                'id' => 6,
                'coordinador_id' => 4,
                'carrera_id' => 7,
                'created_at' => '2023-07-24 14:13:15',
                'updated_at' => '2023-07-24 14:13:15',
            ),
            6 => 
            array (
                'id' => 28,
                'coordinador_id' => 5,
                'carrera_id' => 4,
                'created_at' => '2023-07-26 10:10:37',
                'updated_at' => '2023-07-26 10:10:37',
            ),
            7 => 
            array (
                'id' => 29,
                'coordinador_id' => 5,
                'carrera_id' => 9,
                'created_at' => '2023-07-26 10:10:37',
                'updated_at' => '2023-07-26 10:10:37',
            ),
            8 => 
            array (
                'id' => 30,
                'coordinador_id' => 6,
                'carrera_id' => 11,
                'created_at' => '2023-07-26 10:16:33',
                'updated_at' => '2023-07-26 10:16:33',
            ),
            9 => 
            array (
                'id' => 31,
                'coordinador_id' => 7,
                'carrera_id' => 10,
                'created_at' => '2023-07-26 10:19:09',
                'updated_at' => '2023-07-26 10:19:09',
            ),
            10 => 
            array (
                'id' => 32,
                'coordinador_id' => 8,
                'carrera_id' => 2,
                'created_at' => '2023-07-26 10:23:41',
                'updated_at' => '2023-07-26 10:23:41',
            ),
            11 => 
            array (
                'id' => 33,
                'coordinador_id' => 9,
                'carrera_id' => 13,
                'created_at' => '2023-07-26 10:30:41',
                'updated_at' => '2023-07-26 10:30:41',
            ),
        ));
        
        
    }
}