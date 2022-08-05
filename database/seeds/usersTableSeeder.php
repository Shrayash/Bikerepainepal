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
                'frst_name'=>'BikeRepairs',
                'last_name'=>'Nepal',
                'mobile_no'=>'9802350866',
                'address'=>'Satungal',
                // 'slug'=> Str::slug('BikeRepairs'),
                'password'=>Hash::make('test123!')
            ]
        ]);
    }
}
