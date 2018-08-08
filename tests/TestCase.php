<?php

namespace Ken\BladeMinify\Tests;

use Illuminate\Http\Response;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected $middleware;

    abstract protected function getMiddleware();

    final protected function getNext($html)
    {
        $response = new Response($html);

        return function ($request) use ($response) {
            return $response;
        };
    }
}
