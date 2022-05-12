<?php

use Illuminate\Database\Seeder;

class model_has_rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert([
            [
                'role_id'=>2 ,
                'model_type'=>'App\User',
                'model_id'=> 1
            ]
        ]);
    }
}
