<?php

namespace ByTIC\HttpErrorPages\Generator;

use ByTIC\HttpErrorPages\Utility\Path;
use Composer\Composer;

/**
 * Class Config
 * @package ByTIC\HttpErrorPages\Generator
 */
class Config
{
    protected $data = [];


    protected function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->data['dist_path'] = Path::dist();
    }

    /**
     * @param string $path
     * @return string
     */
    public static function distPath($path = '')
    {
        return static::get('dist_path') . $path;
    }

    /**
     * @param $name
     * @param $default
     * @return mixed
     */
    public static function get($name, $default = null)
    {
        return static::instance()->getData($name, $default);
    }

    /**
     * @param $name
     * @param $value
     */
    public static function set($name, $value)
    {
        static::instance()->setData($name, $value);
    }

    /**
     * @param Composer $composer
     */
    public static function initFromComposer($composer)
    {
        $extras = $composer->getPackage()->getExtra();
        if (isset($extras['http-error-pages'])) {
            foreach ($extras['http-error-pages'] as $name => $value) {
                switch ($name) {
                    case 'dist_path':
                        $installationManager = $composer->getInstallationManager();
                        static::set($name, $installationManager->getInstallPath($composer->getPackage()) . $value);
                        break;
                    default:
                        static::set($name, $value);
                }
            }
        }
    }

    /**
     * @param $name
     * @param $default
     * @return mixed
     */
    protected function getData($name, $default)
    {
        return isset($this->data[$name]) ? $this->data[$name] : $default;
    }


    /**
     * @param $name
     * @param $value
     */
    protected function setData($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Singleton
     *
     * @return self
     */
    protected static function instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $instance = new self();
        }
        return $instance;
    }
}
