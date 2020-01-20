<?php

namespace ByTIC\HttpErrorPages\Integrations\Bytic\Controllers;

use Nip\Http\Response\Response;

/**
 * Trait ErrorControllerTrait
 * @package ByTIC\HttpErrorPages\Integrations\Bytic\Controllers
 */
trait ErrorControllerTrait
{
    use CanRespondWithHttpErrorTrait;

    /**
     * @return Response
     */
    public function index()
    {
        return $this->respondWithHttpErrorCode(404);
    }

    /**
     * @return Response
     */
    public function access()
    {
        return $this->respondWithHttpErrorCode(403);
    }
}
