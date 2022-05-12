<?php

use Illuminate\Database\Seeder;

class groupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'group'=>'Diseases'
            ],[
                'group'=>'Medicine'
            ],[
                'group'=>'Nutrition'
            ],[
                'group'=>'Symptomps'
            ],[
                'group'=>'Lab Test'
            ]
        ]);
    }
}
