<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoordinadorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coordinadors')->delete();
        
        \DB::table('coordinadors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-13 13:05:12',
                'updated_at' => '2023-07-13 13:05:12',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-24 13:40:50',
                'updated_at' => '2023-07-24 13:40:50',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-24 13:42:46',
                'updated_at' => '2023-07-24 13:42:46',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 5,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-24 14:13:15',
                'updated_at' => '2023-07-24 14:13:15',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 6,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:10:37',
                'updated_at' => '2023-07-26 10:10:37',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 7,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:16:33',
                'updated_at' => '2023-07-26 10:16:33',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 8,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:19:09',
                'updated_at' => '2023-07-26 10:19:09',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 9,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:23:41',
                'updated_at' => '2023-07-26 10:23:41',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 10,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:30:41',
                'updated_at' => '2023-07-26 10:30:41',
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 11,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:37:01',
                'updated_at' => '2023-07-26 10:37:01',
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 12,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 10:40:15',
                'updated_at' => '2023-07-26 10:40:15',
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 13,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-07-26 11:13:15',
                'updated_at' => '2023-07-26 11:13:15',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 14,
                'tipo' => 'coordinador',
                'estado' => 'activo',
                'created_at' => '2023-09-13 07:53:14',
                'updated_at' => '2023-09-13 07:53:14',
            ),
        ));
        
        
    }
}