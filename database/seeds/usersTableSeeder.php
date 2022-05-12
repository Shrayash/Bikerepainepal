<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'SuperAdmin',
                'status'=>1,
                'email'=>'abhiyantriktech@gmail.com',
                'verifyToken'=>NULL,
                'password'=>Hash::make('test123!')
            ]
        ]);
    }
}
