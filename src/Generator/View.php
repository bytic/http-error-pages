<?php

namespace ByTIC\HttpErrorPages\Generator;

use ByTIC\HttpErrorPages\Utility\Path;
use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;

/**
 * Class View
 * @package ByTIC\HttpErrorPages\Generator
 */
class View
{
    /**
     * @var null|Twig_Environment
     */
    protected $engine = null;

    public function __construct()
    {
        $this->init();
    }

    /**
     * @param $name
     * @param array $context
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public static function render($name, array $context = [])
    {
        return static::instance()->getEngine()->render($name, $context);
    }

    protected function init()
    {
    }

    /**
     * @return Twig_Environment|null
     */
    protected function getEngine()
    {
        if ($this->engine === null) {
            $this->initEngine();
        }
        return $this->engine;
    }

    protected function initEngine()
    {
        $loader = new Twig_Loader_Filesystem(
            [Path::views()],
            Path::views()
        );
        $engine = new Twig_Environment($loader, ['debug' => true]);
        $engine->addExtension(new Twig_Extension_Debug());
        $this->engine = $engine;
    }

    /**
     * Singleton
     *
     * @return self
     */
    public static function instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $instance = new self();
        }
        return $instance;
    }
}
