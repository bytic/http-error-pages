<?php

namespace ByTIC\HttpErrorPages\Integrations\Bytic\Controllers;

use ByTIC\HttpErrorPages\Utility\Path;
use Nip\Http\Response\Response;

/**
 * Trait CanRespondWithHttpErrorTrait
 * @package ByTIC\HttpErrorPages\Integrations\Bytic\Controllers
 */
trait CanRespondWithHttpErrorTrait
{
    /**
     * @param $code
     * @return Response
     */
    protected function respondWithHttpErrorCode($code)
    {
        /** @var Response $response */
        $response = $this->getResponse();
        $response = $response ? $response : $this->getResponse(true);
        $response->setStatusCode($code);

        $path = Path::config( '/installed.php');
        if (file_exists($path)) {
            $pages = require $path;
            $content = file_get_contents($pages[$code]);
            $response->setContent($content);
        }

        return $response;
    }
}