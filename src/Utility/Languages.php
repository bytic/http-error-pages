<?php

namespace ByTIC\HttpErrorPages\Utility;

/**
 * Class Languages
 * @package ByTIC\HttpErrorPages\Utility
 */
class Languages
{
    protected static $data = [];

    /**
     * @param null $code
     * @return mixed
     */
    public static function forCode($code = null)
    {
        $code = empty($code) ? static::getLanguageCode() : $code;

        if (!static::hasCode($code)) {
            static::initForCode($code);
        }

        return static::$data[$code];
    }

    /**
     * @param $code
     * @return bool
     */
    protected static function hasCode($code)
    {
        return isset($data[$code]);
    }

    /**
     * @param $code
     */
    protected static function initForCode($code)
    {
        static::$data[$code] = static::generateForCode($code);
    }

    /**
     * @param $code
     * @return array|bool|mixed
     */
    protected static function generateForCode($code)
    {
        $data = require Path::languages('/' . $code . '.php');
        return is_array($data) ? $data : false;
    }

    /**
     * @return string
     */
    protected static function getLanguageCode()
    {
        return 'en';
    }
}