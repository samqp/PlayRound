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
        
      
          'http://192.168.0.4/PlayRound/public/verificarconexion',
          'http://192.168.0.4/PlayRound/public/verificarregistro',
          'http://192.168.0.4/PlayRound/public/registroalumnomovil',

    ];
}
