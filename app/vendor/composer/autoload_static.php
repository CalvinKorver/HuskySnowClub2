<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0df50252f9ad1f683fc211d75c9fa2a3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0df50252f9ad1f683fc211d75c9fa2a3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0df50252f9ad1f683fc211d75c9fa2a3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
