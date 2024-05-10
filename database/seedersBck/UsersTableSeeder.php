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
                'email_verified_at' => '2021-10-10 21:05:52',
                'password' => '$2y$10$xEw4f7XlfmC1S70sQs3h5uI1oh6N.3Err3Eldjh9uGHwqkVKzYIT2',
                'persona_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2021-10-10 21:05:38',
                'updated_at' => '2022-04-06 12:55:07',
            ),
//            1 =>
//            array (
//                'id' => 3,
//                'email' => 'acuno@acuno.com',
//                'username' => 'acauno',
//                'email_verified_at' => NULL,
//                'password' => '$2y$10$cguHxeTZtE9T5bSI0rEe/.5fYuCjRydDt1remqYzfjabQq6jvfn9e',
//                'persona_id' => 7,
//                'remember_token' => NULL,
//                'created_at' => '2022-08-05 14:00:25',
//                'updated_at' => '2022-08-05 14:00:25',
//            ),
//            2 =>
//            array (
//                'id' => 4,
//                'email' => 'acados@acados.com',
//                'username' => 'acados',
//                'email_verified_at' => NULL,
//                'password' => '$2y$10$w.qToy9xebyPd2hNgtmK3u7Ixuf01u/apHyZkO1bQiPsG3Pijo0s2',
//                'persona_id' => 8,
//                'remember_token' => NULL,
//                'created_at' => '2022-08-05 14:31:44',
//                'updated_at' => '2022-08-05 14:31:44',
//            ),
        ));


    }
}
