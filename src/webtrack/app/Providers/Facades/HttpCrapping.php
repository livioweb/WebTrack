<?php
namespace App\Providers\Facades;

use Illuminate\Support\Facades\Facade;

class HttpCrapping extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'HttpCrapping';
    }
}
