<?php

namespace ByTIC\HttpErrorPages\Tests\Composer;

use ByTIC\HttpErrorPages\Composer\ScriptHandler;
use ByTIC\HttpErrorPages\Tests\AbstractTest;
use ByTIC\HttpErrorPages\Utility\Path;

/**
 * Class ScriptHandlerTest
 * @package ByTIC\HttpErrorPages\Tests\Composer
 */
class ScriptHandlerTest extends AbstractTest
{
    public function test_savePathsToConfig()
    {
        $filePath = Path::config('/installed.php');
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $pages = [
            200 => Path::dist('/200.html'),
            404 => Path::dist('/404.html'),
        ];

        ScriptHandler::savePathsToConfig($pages);

        $pagesRequired = require_once $filePath;

        self::assertIsArray($pagesRequired);
        self::assertSame($pagesRequired[200], $pages[200]);
    }
}
