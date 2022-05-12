<?php

use Illuminate\Database\Seeder;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name'=>'admin',
                'guard_name'=>'web'
            ],[
                'name'=>'superadmin',
                'guard_name'=>'web'
            ]
        ]);
    }
}
