<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       '/api/login',
       '/api/customer/newbook',
       '/api/customer/details/',
       '/api/customer/details/vehicles/{id}',
       '/api/customer/add/vehicles/',
       '/api/customer/oldbook/store/{id}',
       '/api/customer/service/ongoings/',
       '/api/customer/service/resolved/'
    ];
}
