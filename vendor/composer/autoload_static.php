<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe0f88b302814f22cabeae41d3406bda
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe0f88b302814f22cabeae41d3406bda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe0f88b302814f22cabeae41d3406bda::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
