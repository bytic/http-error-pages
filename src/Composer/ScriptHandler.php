<?php

namespace ByTIC\HttpErrorPages\Composer;

use ByTIC\HttpErrorPages\Generator\Compiler;
use ByTIC\HttpErrorPages\Generator\Config;
use Composer\Script\Event;
use Composer\Installer\PackageEvent;

/**
 * Class ScriptHandler
 * @package ByTIC\HttpErrorPages\Composer
 */
class ScriptHandler
{
    public static function build(Event $event)
    {
        $terminal = $event->getIO();

        Config::initFromComposer($event->getComposer());

        $pages = Compiler::generate();
        foreach ($pages as $code => $path) {
            $message = '..[' . $code . ']';
            $message .= $path ? ' generated path ['. $path . ']': ' not generated';
            $terminal->write($message);
        }

        $terminal->write(' ... <info>Files generated</info>');
    }
}
