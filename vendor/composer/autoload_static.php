<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7485c9cf21d5aaa06057015b1adb3eda
{
    public static $files = array (
        '40c28d98099b5aa00188f6b14662f45a' => __DIR__ . '/../..' . '/src/Core/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'APP\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'APP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7485c9cf21d5aaa06057015b1adb3eda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7485c9cf21d5aaa06057015b1adb3eda::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7485c9cf21d5aaa06057015b1adb3eda::$classMap;

        }, null, ClassLoader::class);
    }
}
