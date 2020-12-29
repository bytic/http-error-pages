<?php /** @noinspection PhpUndefinedClassInspection */

namespace ByTIC\HttpErrorPages\Generator;

use ByTIC\HttpErrorPages\Utility\Path;

/**
 * Class View
 * @package ByTIC\HttpErrorPages\Generator
 */
class View
{
    /**
     * @var null|\Twig_Environment
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
        $loaderClass = (class_exists('Twig_Loader_Filesystem'))
            ? \Twig_Loader_Filesystem::class
            : \Twig\Loader\FilesystemLoader::class;

        $loader = new $loaderClass(
            [Path::views()],
            Path::views()
        );

        $engineClass = (class_exists('Twig_Environment'))
            ? \Twig_Environment::class
            : \Twig\Environment::class;

        $engine = new $engineClass($loader, ['debug' => true]);

        $debugClass = (class_exists('Twig_Extension_Debug'))
            ? \Twig_Extension_Debug::class
            : \Twig\Extension\DebugExtension::class;
        $engine->addExtension(new $debugClass());
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
