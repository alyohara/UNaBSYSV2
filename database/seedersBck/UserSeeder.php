<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'email' => 'admin@admin.com',
                    'username' => 'admin',
                    'password' => '$2y$10$xEw4f7XlfmC1S70sQs3h5uI1oh6N.3Err3Eldjh9uGHwqkVKzYIT2',
                    'created_at' => '2021-10-10 21:05:38',
                    'updated_at' => '2022-04-06 12:55:07',
                    'email_verified_at' => '2021-10-10 21:05:52',
                    'persona_id' => 1,


                ),
        ),
        );
        \DB::table('personas')->delete();

        \DB::table('personas')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'admin',
                    'lastname' => 'admin',
                    'address' => 'none',
                    'phone' => 'none',
                    'birth' => '2021-10-10',
                    'gender' => 'Otro',
                    'email' => 'admin@admin.com',
                    'created_at' => '2021-10-10 21:05:38',
                    'updated_at' => '2022-04-06 12:55:07',
                    'userType_id' => 1,
                    'doc' => '00000000'

                ),
        ),
        );
    }
}
