<?php

namespace ByTIC\HttpErrorPages\Composer;

use ByTIC\HttpErrorPages\Generator\Config;
use Composer\Composer;

/**
 * Class ExtraParser
 * @package ByTIC\HttpErrorPages\Composer
 */
class ExtraParser
{

    /**
     * @param Composer $composer
     */
    public static function handle($composer)
    {
        $extras = $composer->getPackage()->getExtra();
        if (isset($extras['http-error-pages'])) {
            foreach ($extras['http-error-pages'] as $name => $value) {
                switch ($name) {
                    case 'dist_path':
                        $rootPath = rtrim(dirname($composer->getConfig()->get('vendor-dir')), '/');
                        Config::set($name, $rootPath . $value);
                        break;
                    default:
                        Config::set($name, $value);
                }
            }
        }
    }
}
