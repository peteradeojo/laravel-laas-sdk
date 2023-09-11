<?php

use Mockery;

test('log delivers', function () {
    $laas = Mockery::mock("OneZero\Laas\Laas");
    $laas->shouldReceive("info")->once()->andReturn(true);

    $laas->info("test");
});
