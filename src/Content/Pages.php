<?php

namespace ByTIC\HttpErrorPages\Content;

use ByTIC\HttpErrorPages\Utility\Path;

/**
 * Class Pages
 * @package ByTIC\HttpErrorPages\Pages
 */
class Pages
{
    public static $statusCodes = [
        400,
        401,
        403,
        404,
        405,
        406,
        408,
        413,
        414,
        417,
        500,
        502,
        503,
        504,
    ];

    /**
     * @param $code
     * @return bool
     */
    public static function canGeneratePage($code)
    {
        if (!file_exists(Path::views('/pages/' . $code . '.html.twig'))) {
            return false;
        }
        return true;
    }
}
