<?php

if(!function_exists('set_active')){
    function set_active($url, $output = 'active')
    {
        if(is_array($url)){
            foreach($url as $u){
                if(\Illuminate\Support\Facades\Route::is($u)){
                    return $output;
                }
            }
        }else{
            if(\Illuminate\Support\Facades\Route::is($url)){
                return $output;
            }
        }
    }
}

if (! function_exists('format_idr')) {
    function format_idr($val){
        return number_format($val , 0, ',', '.');
    }
}
