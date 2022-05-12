<?php

namespace App\Http\Controllers;

use App\model_has_roles;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function autoSeed()
    {
        if(model_has_roles::all()->isEmpty()){
           
                Artisan::call('config:clear');
                Artisan::call("db:seed",array('--class'=>'usersTableSeeder'));
                Artisan::call("db:seed",array('--class'=>'rolesTableSeeder'));
                Artisan::call("db:seed",array('--class'=>'groupsTableSeeder'));
                Artisan::call("db:seed",array('--class'=>'specialityTableSeeder'));
                Artisan::call("db:seed",array('--class'=>'categoriesTableSeeder'));
                Artisan::call("db:seed",array('--class'=>'model_has_rolesTableSeeder'));
                // Artisan::call('queue:work');
         
            return ("Seeding data completed");
        }else{
            return ("Seeded data already");
        }
       
    }

  }
