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
    /**
     * @param Event $event
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function build(Event $event)
    {
        $terminal = $event->getIO();

        ExtraParser::handle($event->getComposer());

        $pages = Compiler::generate();
        foreach ($pages as $code => $path) {
            $message = '..[' . $code . ']';
            $message .= $path ? ' generated path ['. $path . ']': ' not generated';
            $terminal->write($message);
        }

        $terminal->write(' ... <info>Files generated</info>');
    }
}
