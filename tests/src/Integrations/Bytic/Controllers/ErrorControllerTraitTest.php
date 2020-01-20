<?php

namespace ByTIC\HttpErrorPages\Tests\Integrations\Bytic\Controllers;

use ByTIC\HttpErrorPages\Tests\AbstractTest;
use ByTIC\HttpErrorPages\Tests\Fixtures\Integrations\Bytic\Controllers\ErrorController;
use Nip\Http\Response\Response;

/**
 * Class ErrorControllerTraitTest
 * @package ByTIC\HttpErrorPages\Tests\Integrations\Bytic\Controllers
 */
class ErrorControllerTraitTest extends AbstractTest
{
    public function test_index()
    {
        $controller = new ErrorController();

        $response = $controller->index();
        self::assertInstanceOf(Response::class, $response);
        self::stringContains('404', $response->getContent());
    }

    public function test_access()
    {
        $controller = new ErrorController();

        $response = $controller->index();
        self::assertInstanceOf(Response::class, $response);
        self::stringContains('404', $response->getContent());
    }
}
