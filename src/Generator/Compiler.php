<?php

namespace ByTIC\HttpErrorPages\Generator;

use ByTIC\HttpErrorPages\Pages\Pages;
use ByTIC\HttpErrorPages\Utility\Languages;
use ByTIC\HttpErrorPages\Utility\Path;

/**
 * Class Compiler
 * @package ByTIC\HttpErrorPages\Generator
 */
class Compiler
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function generate()
    {
        $return = [];
        foreach (Pages::$statusCodes as $code) {
            $return[$code] = static::generateForCode($code);
        }
        return $return;
    }

    /**
     * @param string $code
     * @return bool|string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function generateForCode($code)
    {
        if (!Pages::canGeneratePage($code)) {
            return false;
        }

        $path = Config::distPath('/' . $code . '.html');
        file_put_contents(
            $path,
            View::render('/pages/' . $code . '.html.twig', static::generateForCodeVariables($code))
        );

        return $path;
    }

    /**
     * @param $code
     * @return array
     */
    protected static function generateForCodeVariables($code)
    {
        $data = [];
        $data['statusCode'] = $code;
        $languageData = Languages::forCode();
        if (is_array($languageData)) {
            $data = array_merge($data, $languageData['errorPages'][$code]);
            unset($languageData['errorPages']);
            $data = array_merge($data, $languageData);
        }
        return $data;
    }
}
