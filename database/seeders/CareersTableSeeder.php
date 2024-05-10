<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('careers')->delete();
        
        \DB::table('careers')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (CCC-001)',
                'DenominacionCarrera' => 'CCC - LICENCIATURA EN ENSEÑANZA DE MATEMÁTICA',
                'Titulo' => 'LICENCIADO/A EN ENSEÑANZA DE LA MATEMÁTICA',
                'ResolucionAprobacionCS' => 'RR-38/19-CS',
                'ResolucionCorrelativasCS' => 'RR-88/22-CS',
                'ResolucionMinisterial' => 'RESOL-2021-3219-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (L-001)',
                'DenominacionCarrera' => 'LICENCIATURA EN CIENCIAS DE DATOS',
                'Titulo' => 'LICENCIADO/A EN CIENCIAS DE DATOS',
                'ResolucionAprobacionCS' => 'RR-37/19-CS MODIFICADA POR RR-46/21-CS',
                'ResolucionCorrelativasCS' => 'RR-85/22-CS',
                'ResolucionMinisterial' => 'RESOL-2019-3514-APN-MECCYT MODIFICADA POR RESOL-2022-88-APN-SECPU#ME ',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (L-002)',
                'DenominacionCarrera' => 'LICENCIATURA EN LOGÍSTICA Y TRANSPORTE',
                'Titulo' => 'LICENCIADO/A EN LOGÍSTICA Y TRANSPORTE',
                'ResolucionAprobacionCS' => 'RR-22/19-CS',
                'ResolucionCorrelativasCS' => '-------------------------------------',
                'ResolucionMinisterial' => 'RESOL-2020-650-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (L-003)',
                'DenominacionCarrera' => 'LICENCIATURA EN ADMINISTRACIÓN',
                'Titulo' => 'LICENCIADO/A EN ADMINISTRACIÓN',
                'ResolucionAprobacionCS' => 'RR-23/19-CS',
                'ResolucionCorrelativasCS' => 'RR-87/22-CS',
                'ResolucionMinisterial' => 'RESOL-2021-1035-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (L-004)',
                'DenominacionCarrera' => 'LICENCIATURA EN CIENCIA POLÍTICA',
                'Titulo' => 'LICENCIADO/A EN CIENCIA POLÍTICA',
                'ResolucionAprobacionCS' => 'CS-67/20-GA',
                'ResolucionCorrelativasCS' => 'CS-68/20-GA MODIFICADO POR RR-90/22-CS',
                'ResolucionMinisterial' => 'RESOL-2021-2609-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-001)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN AUTOMATIZACIÓN Y CONTROL',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN AUTOMATIZACIÓN Y CONTROL',
                'ResolucionAprobacionCS' => 'RR-14/19-GB MODIFICADO POR RR-18/19-GB',
                'ResolucionCorrelativasCS' => 'RR-14/19-GB MODIFICADO POR RR-18/19-GB',
                'ResolucionMinisterial' => 'RESOL-2719/19-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-002)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN GESTIÓN DE LAS ORGANIZACIONES',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN GESTIÓN DE LAS ORGANIZACIONES',
                'ResolucionAprobacionCS' => 'RR-16/19-GB',
                'ResolucionCorrelativasCS' => 'RR-16/19-GB MODIFICADO POR RR-89/22-CS',
                'ResolucionMinisterial' => 'RESOL-2799/19-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-003)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN LOGÍSTICA Y TRANSPORTE',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN LOGÍSTICA Y TRANSPORTE',
                'ResolucionAprobacionCS' => 'RR-15/19-GB MODIFICADO POR RR-19/19-GB',
                'ResolucionCorrelativasCS' => 'RR-15/19-GB MODIFICADO POR RR-19/19-GB',
                'ResolucionMinisterial' => 'RESOL-2019-2755-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-004)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN ACOMPAÑAMIENTO TERAPÉUTICO',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN ACOMPAÑAMIENTO TERAPÉUTICO',
                'ResolucionAprobacionCS' => 'RR-24/19-CS MODIFICADO POR CS-71/20-GA',
                'ResolucionCorrelativasCS' => 'CS-73/20-GA',
                'ResolucionMinisterial' => 'RESOL-2021-1046-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-005)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN COMUNICACIÓN DIGITAL',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN COMUNICACIÓN DIGITAL',
                'ResolucionAprobacionCS' => 'RR-25/19-CS',
                'ResolucionCorrelativasCS' => 'RR-86/22-CS',
                'ResolucionMinisterial' => 'RESOL-2020-493-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-006)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN DISEÑO Y DESARROLLO DE PRODUCTO',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN DISEÑO Y DESARROLLO DE PRODUCTO',
                'ResolucionAprobacionCS' => 'RR-26/19-CS MODIFICADO POR CS-72/20-GA',
                'ResolucionCorrelativasCS' => 'CS-74/20-GA',
                'ResolucionMinisterial' => 'RESOL-2021-1631-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-007)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN PRÓTESIS DENTAL',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN PRÓTESIS DENTAL',
                'ResolucionAprobacionCS' => 'CS-69/20-GA',
                'ResolucionCorrelativasCS' => 'CS-70/20-GA MODIFICADO POR RR-79/21-CS',
                'ResolucionMinisterial' => 'RESOL-2021-1647-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => '',
                'dateInit' => NULL,
                'data' => NULL,
                'college_id' => NULL,
                'years' => 0.0,
            'CodigoSIU' => 'Plan: (T-008)',
                'DenominacionCarrera' => 'TECNICATURA UNIVERSITARIA EN PROGRAMACIÓN',
                'Titulo' => 'TÉCNICO/A UNIVERSITARIO/A EN PROGRAMACIÓN',
                'ResolucionAprobacionCS' => 'RR-54/21-CS',
                'ResolucionCorrelativasCS' => 'RR-55/21-CS',
                'ResolucionMinisterial' => 'RESOL-2022-1151-APN-ME',
                'coordinador_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}