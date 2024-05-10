<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoordinadorMateriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coordinador_materias')->delete();
        
        \DB::table('coordinador_materias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'coordinador_id' => 1,
                'materia_id' => 29,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            1 => 
            array (
                'id' => 2,
                'coordinador_id' => 1,
                'materia_id' => 30,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            2 => 
            array (
                'id' => 3,
                'coordinador_id' => 1,
                'materia_id' => 31,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            3 => 
            array (
                'id' => 4,
                'coordinador_id' => 1,
                'materia_id' => 36,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            4 => 
            array (
                'id' => 5,
                'coordinador_id' => 1,
                'materia_id' => 37,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            5 => 
            array (
                'id' => 6,
                'coordinador_id' => 1,
                'materia_id' => 76,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            6 => 
            array (
                'id' => 7,
                'coordinador_id' => 1,
                'materia_id' => 153,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            7 => 
            array (
                'id' => 8,
                'coordinador_id' => 1,
                'materia_id' => 155,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            8 => 
            array (
                'id' => 9,
                'coordinador_id' => 1,
                'materia_id' => 156,
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            9 => 
            array (
                'id' => 11,
                'coordinador_id' => 3,
                'materia_id' => 4,
                'created_at' => '2023-07-24 13:42:46',
                'updated_at' => '2023-07-24 13:42:46',
            ),
            10 => 
            array (
                'id' => 12,
                'coordinador_id' => 4,
                'materia_id' => 5,
                'created_at' => '2023-07-24 14:13:15',
                'updated_at' => '2023-07-24 14:13:15',
            ),
            11 => 
            array (
                'id' => 15,
                'coordinador_id' => 2,
                'materia_id' => 6,
                'created_at' => '2023-07-26 10:32:02',
                'updated_at' => '2023-07-26 10:32:02',
            ),
            12 => 
            array (
                'id' => 16,
                'coordinador_id' => 2,
                'materia_id' => 270,
                'created_at' => '2023-07-26 10:32:02',
                'updated_at' => '2023-07-26 10:32:02',
            ),
            13 => 
            array (
                'id' => 17,
                'coordinador_id' => 10,
                'materia_id' => 2,
                'created_at' => '2023-07-26 10:37:01',
                'updated_at' => '2023-07-26 10:37:01',
            ),
            14 => 
            array (
                'id' => 18,
                'coordinador_id' => 11,
                'materia_id' => 2,
                'created_at' => '2023-07-26 10:40:15',
                'updated_at' => '2023-07-26 10:40:15',
            ),
            15 => 
            array (
                'id' => 19,
                'coordinador_id' => 11,
                'materia_id' => 265,
                'created_at' => '2023-07-26 10:40:15',
                'updated_at' => '2023-07-26 10:40:15',
            ),
            16 => 
            array (
                'id' => 20,
                'coordinador_id' => 12,
                'materia_id' => 3,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            17 => 
            array (
                'id' => 21,
                'coordinador_id' => 12,
                'materia_id' => 28,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            18 => 
            array (
                'id' => 22,
                'coordinador_id' => 12,
                'materia_id' => 51,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            19 => 
            array (
                'id' => 23,
                'coordinador_id' => 12,
                'materia_id' => 172,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            20 => 
            array (
                'id' => 24,
                'coordinador_id' => 12,
                'materia_id' => 175,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            21 => 
            array (
                'id' => 25,
                'coordinador_id' => 12,
                'materia_id' => 176,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            22 => 
            array (
                'id' => 26,
                'coordinador_id' => 12,
                'materia_id' => 179,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            23 => 
            array (
                'id' => 27,
                'coordinador_id' => 12,
                'materia_id' => 182,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            24 => 
            array (
                'id' => 28,
                'coordinador_id' => 12,
                'materia_id' => 183,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            25 => 
            array (
                'id' => 29,
                'coordinador_id' => 12,
                'materia_id' => 185,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            26 => 
            array (
                'id' => 30,
                'coordinador_id' => 12,
                'materia_id' => 187,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            27 => 
            array (
                'id' => 31,
                'coordinador_id' => 12,
                'materia_id' => 266,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            28 => 
            array (
                'id' => 32,
                'coordinador_id' => 12,
                'materia_id' => 267,
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            29 => 
            array (
                'id' => 33,
                'coordinador_id' => 13,
                'materia_id' => 285,
                'created_at' => '2023-09-13 07:53:14',
                'updated_at' => '2023-09-13 07:53:14',
            ),
        ));
        
        
    }
}