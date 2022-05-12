<?php

use Illuminate\Database\Seeder;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category'=>'Pediatrics',
                'imgname'=>'pediatrics.svg'
            ],[
                'category'=>'Gynecology',
                'imgname'=>'vagina.svg'
            ],[
                'category'=>'Dental',
                'imgname'=>'teeth.svg'
            ],[
                'category'=>'Cardiology',
                'imgname'=>'heart.png'
            ],[
                'category'=>'Orthopedic',
                'imgname'=>'orthopedics.svg'
            ],[
                'category'=>'Neurology',
                'imgname'=>'brain.svg'
            ]
        ]);
    }
}
