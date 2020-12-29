<?php

namespace ByTIC\HttpErrorPages\Composer;

use ByTIC\HttpErrorPages\Generator\Compiler;
use ByTIC\HttpErrorPages\Utility\Path;
use Composer\Script\Event;

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
        $basepath = dirname(current($pages));
        $terminal->write(' ... <info>BasePath: ['.$basepath.']</info>');
        foreach ($pages as $code => $path) {
            $message = ' [' . $code;
            $message .= ' '. ($path ? '✅' : '❌');
            $message .= ']';
            $terminal->write($message, false);
        }

        static::savePathsToConfig($pages);

        $terminal->write(' ... <info>Files generated</info>');
    }

    /**
     * @param $pages
     */
    public static function savePathsToConfig($pages)
    {
        $file = Path::config('/installed.php');

        $content = '<?php return ' . var_export($pages, true) . ';';
        file_put_contents($file, $content);
    }
}
