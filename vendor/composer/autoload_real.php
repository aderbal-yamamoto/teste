<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit1eaec0c8c88c2bfb536661e3aa89510a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit1eaec0c8c88c2bfb536661e3aa89510a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit1eaec0c8c88c2bfb536661e3aa89510a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit1eaec0c8c88c2bfb536661e3aa89510a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
