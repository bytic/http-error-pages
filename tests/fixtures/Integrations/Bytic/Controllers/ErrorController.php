<?php

namespace ByTIC\HttpErrorPages\Tests\Fixtures\Integrations\Bytic\Controllers;

use ByTIC\HttpErrorPages\Integrations\Bytic\Controllers\ErrorControllerTrait;
use \Nip\Controllers\Controller;

/**
 * Class ErrorController
 * @package ByTIC\HttpErrorPages\Tests\Fixtures\Integrations\Bytic\Controllers
 */
class ErrorController extends Controller
{
    use ErrorControllerTrait;
}
