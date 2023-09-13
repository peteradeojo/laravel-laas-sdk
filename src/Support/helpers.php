<?php

use OneZero\Laas\Laas;

if (!function_exists('laas')) {
    function laas(): Laas
    {
        return app()->make('laas');
    }
}
