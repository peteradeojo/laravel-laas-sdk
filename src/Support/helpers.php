<?php

if (!function_exists('laas')) {
    function laas()
    {
        return app()->make('laas');
    }
}
