<?php

namespace ByTIC\HttpErrorPages\Composer;

use ByTIC\HttpErrorPages\Generator\Compiler;
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
        $IO = $event->getIO();
        $pages = Compiler::generate();
        foreach ($pages as $code => $path) {
            $message = '..[' . $code . ']';
            $message .= $path ? ' generated path ['. $path . ']': ' not generated';
            $IO->write($message);
        }
        $IO->write(' ... <info>Files generated</info>');
    }
}
