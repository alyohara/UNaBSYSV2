<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CareersTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(CollegesTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(SubjectCareerTableSeeder::class);
    }
}
