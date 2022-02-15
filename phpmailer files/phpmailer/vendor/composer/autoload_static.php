<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9e43d0ee56c60b11f8a9bea28b03b7f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9e43d0ee56c60b11f8a9bea28b03b7f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9e43d0ee56c60b11f8a9bea28b03b7f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb9e43d0ee56c60b11f8a9bea28b03b7f::$classMap;

        }, null, ClassLoader::class);
    }
}
