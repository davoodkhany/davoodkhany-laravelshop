<?php

use Illuminate\Support\Facades\Route;

if(! function_exists('isActive')){

    function isActive($key, $value = 'active'){

        if(is_array($key))
        {
            return in_array(Route::currentRouteName() , $key) ? $value : '';
        }

        return Route::currentRouteName() == $key ? $value : '';
    }

}
