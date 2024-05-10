<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('personas')->delete();

        \DB::table('personas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'lastname' => 'admin',
                'address' => 'none',
                'birth' => '2021-10-10',
                'gender' => 'Otro',
                'phone' => 'none',
                'email' => 'admin@admin.com',
                'doc' => 0,
                'userType_id' => 1,
                'cv_id' => NULL,
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),

        ));



    }
}
