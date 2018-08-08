<?php

namespace Ken\BladeMinify\Tests\Middleware;

use Illuminate\Http\Request;
use Ken\BladeMinify\Middleware\Minify;
use Ken\BladeMinify\Tests\TestCase;

class MinifyTest extends TestCase
{
    private $request;

    protected function getMiddleware()
    {
        if (!$this->middleware instanceof Minify) {
            $this->middleware = new Minify();
        }

        return $this->middleware;
    }

    public function setUp()
    {
        parent::setUp();

        $this->request = new Request();
    }

    public function testCollapseWhitespace()
    {
        $before = \file_get_contents(__DIR__.'/../boilerplate/before_default.html');
        $after = \file_get_contents(__DIR__.'/../boilerplate/after_default.html');

        $response = $this->getMiddleware()->handle($this->request, $this->getNext($before));

        $this->assertSame($after, $response->getContent());
    }

    public function testCollapseWhitespacePre()
    {
        $before = \file_get_contents(__DIR__.'/../boilerplate/before_pre.html');
        $after = \file_get_contents(__DIR__.'/../boilerplate/after_pre.html');

        $response = $this->getMiddleware()->handle($this->request, $this->getNext($before));

        $this->assertSame($after, $response->getContent());
    }
}
