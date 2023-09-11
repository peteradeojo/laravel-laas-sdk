<?php

// use Mockery;
use OneZero\Laas\Laas;

test('facade works', function () {
    $laas = Mockery::mock(Laas::class);
    expect($laas instanceof Laas)->toBeTrue();
});
