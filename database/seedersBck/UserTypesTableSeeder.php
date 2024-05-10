<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('user_types')->delete();

        \DB::table('user_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'type' => 'superadmin',
                'data' => 'superadmin',
                'name' => 'Administrador',
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),
            1 =>
            array (
                'id' => 2,
                'type' => 'academic1',
                'data' => 'academic1',
                'name' => 'Académico Nivel 1',
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),
            2 =>
            array (
                'id' => 3,
                'type' => 'academic2',
                'data' => 'academic2',
                'name' => 'Académico Nivel 2',
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),
            3 =>
            array (
                'id' => 4,
                'type' => 'profesor',
                'data' => 'profesor',
                'name' => 'Profesor',
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),
            4 =>
                array(
                    'id' => 6,
                    'type' => 'bedel',
                    'data' => 'bedel',
                    'name' => 'Bedel',
                    'created_at' => '2021-10-10 21:05:38',
                    'updated_at' => '2022-04-06 12:55:07',

                ),
            5 =>
                array(
                    'id' => 7,
                    'type' => 'coordinador',
                    'data' => 'coordinador',
                    'name' => 'Coordinador',
                    'created_at' => '2021-10-10 21:05:38',
                    'updated_at' => '2022-04-06 12:55:07',

                ),
            6 =>
            array (
                'id' => 5,
                'type' => 'basic',
                'data' => 'basic',
                'name' => 'Básico',
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),

        ));


    }
}
