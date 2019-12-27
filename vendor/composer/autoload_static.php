<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite18987548d5b44a926c8e5ba69c53516
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite18987548d5b44a926c8e5ba69c53516::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite18987548d5b44a926c8e5ba69c53516::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
