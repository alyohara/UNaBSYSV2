<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'email_verified_at' => '2021-10-10 18:05:52',
                'password' => '$2y$10$xEw4f7XlfmC1S70sQs3h5uI1oh6N.3Err3Eldjh9uGHwqkVKzYIT2',
                'persona_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2021-10-10 18:05:38',
                'updated_at' => '2022-04-06 09:55:07',
            ),
            1 => 
            array (
                'id' => 2,
                'email' => 'matias.triguboff@unab.edu.ar',
                'username' => 'matias.triguboff',
                'email_verified_at' => NULL,
                'password' => '$2y$10$JXkQErL8H94pbVcrm3jgaOEgu0IqVgqopJk.dVZHnKPXq50TxOPca',
                'persona_id' => 138,
                'remember_token' => NULL,
                'created_at' => '2023-07-13 12:59:05',
                'updated_at' => '2023-07-13 12:59:05',
            ),
            2 => 
            array (
                'id' => 3,
                'email' => 'jorgelina.maruzza@unab.edu.ar',
                'username' => 'Jorgelina.Maruzza',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QWUc6cEiHlQAnuE3qnbu2eci5RdDjTAk/wN42C2/5CeEfGfTCA2Pa',
                'persona_id' => 308,
                'remember_token' => NULL,
                'created_at' => '2023-07-24 13:39:58',
                'updated_at' => '2023-07-24 13:39:58',
            ),
            3 => 
            array (
                'id' => 4,
                'email' => 'mariana.fingolo@unab.edu.ar',
                'username' => 'Mariana.Fingolo',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5HcQKX4Fo3Z4e9iP8HLgvO7GlHQVkqLvZuOuZSGLlMBBavkuZB47u',
                'persona_id' => 12,
                'remember_token' => NULL,
                'created_at' => '2023-07-24 13:41:57',
                'updated_at' => '2023-07-24 13:41:57',
            ),
            4 => 
            array (
                'id' => 5,
                'email' => 'martin.arana@unab.edu.ar',
                'username' => 'Martín.Arana',
                'email_verified_at' => NULL,
                'password' => '$2y$10$KPLnehiM0J5euxqagrPsNOL6/cXkUSnEMgUpYsAdxRWU.hXkhYpHi',
                'persona_id' => 42,
                'remember_token' => NULL,
                'created_at' => '2023-07-24 13:43:43',
                'updated_at' => '2023-07-24 13:43:43',
            ),
            5 => 
            array (
                'id' => 6,
                'email' => 'ricardo.blanco@unab.edu.ar',
                'username' => 'Ricardo.Blanco',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Tor7Le8GCSwuBc8PnHmp1OdH5oPAQ3.NNVzPmuF11bo3N.WBEnqni',
                'persona_id' => 7,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:10:00',
                'updated_at' => '2023-07-26 10:10:00',
            ),
            6 => 
            array (
                'id' => 7,
                'email' => 'gentilab@gmail.com',
                'username' => 'Andrea.Gentil',
                'email_verified_at' => NULL,
                'password' => '$2y$10$o1kwG10TJAtW8fayzVLLi.35MBK8CEnCGLbvQv7w1oNxSG7eUG2Sy',
                'persona_id' => 226,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:16:16',
                'updated_at' => '2023-07-26 10:16:16',
            ),
            7 => 
            array (
                'id' => 8,
                'email' => 'eduardo.a.uruena@unab.edu.ar',
                'username' => 'Eduardo.Urueña',
                'email_verified_at' => NULL,
                'password' => '$2y$10$x/g8vp5a.WreuWfWMrQUU.igwGiDueriS6HG5Y5CnvYf0M7e6AqGS',
                'persona_id' => 129,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:18:51',
                'updated_at' => '2023-07-26 10:18:51',
            ),
            8 => 
            array (
                'id' => 9,
                'email' => 'lisandro.abrego@unab.edu.ar',
                'username' => 'Lisandro.Abrego',
                'email_verified_at' => NULL,
                'password' => '$2y$10$axNsIjwfY7Wh/eH7PNJlXeFQ/.kQCoB0rNOPLrdnNTz7KtQ5/17wy',
                'persona_id' => 393,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:21:57',
                'updated_at' => '2023-07-26 10:21:57',
            ),
            9 => 
            array (
                'id' => 10,
                'email' => 'fede_sarg@hotmail.com',
                'username' => 'Federico.Sario',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8TbrSV0OXWlI21YR4xi2Pece1HQgcml2rbiPdqTT8TakdnmGX8Uuu',
                'persona_id' => 191,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:30:27',
                'updated_at' => '2023-07-26 10:30:27',
            ),
            10 => 
            array (
                'id' => 11,
                'email' => 'nestor.blanco@unab.edu.ar',
                'username' => 'Nestor.Blanco',
                'email_verified_at' => NULL,
                'password' => '$2y$10$syybKE7SFQBzn7l9DwWO4evG.i4eSwXuG0XojhP2Hr9pLnhAMhL9G',
                'persona_id' => 6,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:36:53',
                'updated_at' => '2023-07-26 10:36:53',
            ),
            11 => 
            array (
                'id' => 12,
                'email' => 'gaston.kneeteman@unab.edu.ar',
                'username' => 'Gaston.Kneeteman',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Zz9E6fuGsZ1yArZlu5edbOgWw5LBryUGgnqRDOFDr9.DUaEhf0o/6',
                'persona_id' => 283,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:40:03',
                'updated_at' => '2023-07-26 10:40:03',
            ),
            12 => 
            array (
                'id' => 13,
                'email' => 'gonzalo.flores@unab.edu.ar',
                'username' => 'Gonzalo.Flores',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Fz10aoLwk5XtrByP0s5FzOibugjiDALbYGDb9hJM7KMh1Ucl/5Ta.',
                'persona_id' => 13,
                'remember_token' => NULL,
                'created_at' => '2023-07-26 10:55:34',
                'updated_at' => '2023-07-26 10:55:34',
            ),
            13 => 
            array (
                'id' => 14,
                'email' => 'estela.moyano@unab.edu.ar',
                'username' => 'Estela.Moyano',
                'email_verified_at' => NULL,
                'password' => '$2y$10$d4u97KhTrmB5eM5DbWp7EOwe91sBPrtbYq.f72l/rbaXRJunOzfDW',
                'persona_id' => 14,
                'remember_token' => NULL,
                'created_at' => '2023-09-07 10:44:37',
                'updated_at' => '2023-09-07 10:44:37',
            ),
            14 => 
            array (
                'id' => 15,
                'email' => 'agustina.martinez@unba.edu.ar',
                'username' => 'Agustina.Martinez',
                'email_verified_at' => NULL,
                'password' => '$2y$10$dLJo53Ho5fXqzhXsIKtXuuAwK4VUOtQToLUKxaaY13ud.mgtcI2si',
                'persona_id' => 475,
                'remember_token' => NULL,
                'created_at' => '2023-09-14 09:21:27',
                'updated_at' => '2023-09-14 09:21:27',
            ),
        ));
        
        
    }
}