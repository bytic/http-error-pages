<?php

namespace ByTIC\HttpErrorPages\Content;

use ByTIC\HttpErrorPages\Generator\Config;

/**
 * Class Links
 * @package ByTIC\HttpErrorPages\Content
 */
class Links
{
    /**
     * @return array|null
     */
    public static function get()
    {
        return Config::get('suggestion_links');
    }
}
