<?php

namespace ByTIC\HttpErrorPages\Generator;

use ByTIC\HttpErrorPages\Pages\Pages;
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
     * @return void
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function generateForCode($code)
    {
        if (!Pages::canGeneratePage($code)) {
            return;
        }
        $data = [];
        $data['statusCode'] = $code;

        $path = Path::dist('/' . $code . '.html');
        file_put_contents(
            $path,
            View::render('/pages/' . $code . '.html.twig', $data)
        );

        return $path;
    }
}
