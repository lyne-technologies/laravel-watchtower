<?php

namespace LyneTechnologies\LaravelWatchtower\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelWatchtower extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravelwatchtower';
    }
}