<?php

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
        $this->call([usersTableSeeder::class,groupsTableSeeder::class,specialityTableSeeder::class,categoriesTableSeeder::class,rolesTableSeeder::class,model_has_rolesTableSeeder::class]);
    }
}
