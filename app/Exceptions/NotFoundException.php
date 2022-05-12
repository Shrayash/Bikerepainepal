<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    function report(){ }
    function render(){
        return view('error');
    }
}
