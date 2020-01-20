<?php

namespace ByTIC\HttpErrorPages\Utility;

/**
 * Class Path
 * @package ByTIC\HttpErrorPages\Utility
 */
class Path
{
    /**
     * @param null|string $path
     * @return string
     */
    public static function base($path = null)
    {
        return dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . $path;
    }

    /**
     * @param null|string $path
     * @return string
     */
    public static function dist($path = null)
    {
        return static::base(DIRECTORY_SEPARATOR . 'dist' . $path);
    }

    /**
     * @param null|string $path
     * @return string
     */
    public static function config($path = null)
    {
        return static::base(DIRECTORY_SEPARATOR . 'config' . $path);
    }

    /**
     * @param null|string $path
     * @return string
     */
    public static function resources($path = null)
    {
        return static::base(DIRECTORY_SEPARATOR . 'resources' . $path);
    }

    /**
     * @param null|string $path
     * @return string
     */
    public static function views($path = null)
    {
        return static::resources(DIRECTORY_SEPARATOR . 'views' . $path);
    }

    /**
     * @param null|string $path
     * @return string
     */
    public static function languages($path = null)
    {
        return static::resources(DIRECTORY_SEPARATOR . 'languages' . $path);
    }
}
