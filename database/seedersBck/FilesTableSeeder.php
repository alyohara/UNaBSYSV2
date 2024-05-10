<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('files')->delete();
        
        \DB::table('files')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '1657548250_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'file_path' => '/storage/uploads/1657548250_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'created_at' => '2022-07-11 14:04:10',
                'updated_at' => '2022-07-11 14:04:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '1657548918_certificado_alumno_regular.pdf',
                'file_path' => '/storage/uploads/1657548918_certificado_alumno_regular.pdf',
                'created_at' => '2022-07-11 14:15:18',
                'updated_at' => '2022-07-11 14:15:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '1657549510_certificado_alumno_regular.pdf',
                'file_path' => '/storage/uploads/1657549510_certificado_alumno_regular.pdf',
                'created_at' => '2022-07-11 14:25:10',
                'updated_at' => '2022-07-11 14:25:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '1657551963_certificado_alumno_regular.pdf',
                'file_path' => '/storage/uploads/1657551963_certificado_alumno_regular.pdf',
                'created_at' => '2022-07-11 15:06:03',
                'updated_at' => '2022-07-11 15:06:03',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '1657551976_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'file_path' => '/storage/uploads/1657551976_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'created_at' => '2022-07-11 15:06:16',
                'updated_at' => '2022-07-11 15:06:16',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '1657552403_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'file_path' => '/storage/uploads/1657552403_xtraSolicpracticaDisca - 2022-06-10T121710.812.pdf',
                'created_at' => '2022-07-11 15:13:23',
                'updated_at' => '2022-07-11 15:13:23',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '1657552416_certificado_alumno_regular.pdf',
                'file_path' => '/storage/uploads/1657552416_certificado_alumno_regular.pdf',
                'created_at' => '2022-07-11 15:13:36',
                'updated_at' => '2022-07-11 15:13:36',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '1659709903_TransferenciaTercero-28532558_28532558_22-07-2022.pdf',
                'file_path' => '/storage/uploads/1659709903_TransferenciaTercero-28532558_28532558_22-07-2022.pdf',
                'created_at' => '2022-08-05 14:31:43',
                'updated_at' => '2022-08-05 14:31:43',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '1659710331_TransferenciaTercero-28532558_28532558_22-07-2022.pdf',
                'file_path' => '/storage/uploads/1659710331_TransferenciaTercero-28532558_28532558_22-07-2022.pdf',
                'created_at' => '2022-08-05 14:38:51',
                'updated_at' => '2022-08-05 14:38:51',
            ),
        ));
        
        
    }
}