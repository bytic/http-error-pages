<?php

namespace ByTIC\HttpErrorPages\Tests\Generator;

use ByTIC\HttpErrorPages\Tests\AbstractTest;
use ByTIC\HttpErrorPages\Generator\Config;

/**
 * Class ConfigTest
 * @package ByTIC\HttpErrorPages\Tests\Generator
 */
class ConfigTest extends AbstractTest
{
    public static function testSet()
    {
        static::assertNull(Config::get('test'));
        Config::set('test', 'foe');
        static::assertSame('foe', Config::get('test'));
    }
}
