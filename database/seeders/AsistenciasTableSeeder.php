<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsistenciasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asistencias')->delete();
        
        \DB::table('asistencias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'profesor_id' => 25,
                'bedel_id' => 1,
                'subject_id' => 2,
                'status' => '1',
                'fecha' => NULL,
                'fecha_inicio' => '2023-08-27',
                'fecha_fin' => '2023-09-13',
                'tipo' => 'porPeriodo',
                'created_at' => '2023-09-13 10:18:37',
                'updated_at' => '2023-09-13 10:18:37',
            ),
            1 => 
            array (
                'id' => 2,
                'profesor_id' => 371,
                'bedel_id' => 15,
                'subject_id' => 190,
                'status' => '0',
                'fecha' => '2023-08-28',
                'fecha_inicio' => NULL,
                'fecha_fin' => NULL,
                'tipo' => 'porFecha',
                'created_at' => '2023-10-02 16:48:40',
                'updated_at' => '2023-10-02 16:48:40',
            ),
        ));
        
        
    }
}