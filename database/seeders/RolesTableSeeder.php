<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:27:21',
                'updated_at' => '2022-11-28 08:27:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'acaUno',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:27:30',
                'updated_at' => '2022-11-28 08:27:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'acaDos',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:27:36',
                'updated_at' => '2022-11-28 08:27:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'acaTres',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:27:43',
                'updated_at' => '2022-11-28 08:27:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'bedel',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:27:52',
                'updated_at' => '2022-11-28 08:27:52',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'coordinador',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:28:06',
                'updated_at' => '2022-11-28 08:28:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'profesor',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:28:17',
                'updated_at' => '2022-11-28 08:28:17',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'basic',
                'guard_name' => 'api',
                'created_at' => '2022-11-28 08:28:25',
                'updated_at' => '2022-11-28 08:28:25',
            ),
        ));
        
        
    }
}