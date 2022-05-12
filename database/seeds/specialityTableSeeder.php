<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class specialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('speciality')->insert([
            [
                'speciality'=>'Child Birth'
            ],[
                'speciality'=>'Diabetes'
            ],[
                'speciality'=>'HIV/AIDS'
            ],[
                'speciality'=>'COVID-19'
            ],[
                'speciality'=>'Cardiology'
            ],[
                'speciality'=>'Dental'
            ]
        ]);
    }
}
