<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita18457ae1c68ae1a8d969f4d76dc4dac
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInita18457ae1c68ae1a8d969f4d76dc4dac', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita18457ae1c68ae1a8d969f4d76dc4dac', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita18457ae1c68ae1a8d969f4d76dc4dac::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
