<?php

namespace ByTIC\HttpErrorPages\Tests\Generator;

use ByTIC\HttpErrorPages\Generator\Config;
use PHPUnit\Framework\TestCase;

/**
 * Class ConfigTest
 * @package ByTIC\HttpErrorPages\Tests\Generator
 */
class ConfigTest extends TestCase
{
    public static function testSet()
    {
        static::assertNull(Config::get('test'));
        Config::set('test', 'foe');
        static::assertSame('foe', Config::get('test'));
    }
}
