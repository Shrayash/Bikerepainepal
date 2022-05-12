<?php

namespace App\Http\Controllers;
use Artisan;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function store_link()
    {
            Artisan::call('storage:link');
            return ("Linking completed");   
    }
}
