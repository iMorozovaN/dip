<?php

namespace engine;

class FileLoader {

    private function __construct() {}

    private function __clone() {}

    public static function registerPath($basePath) {

        # http://php.net/manual/ru/function.spl-autoload-register.php
        spl_autoload_register(function($className) use ($basePath)  {

            $file = $basePath.str_ireplace( '\\', DIRECTORY_SEPARATOR, $className).'.php';
                                                     
            /** @noinspection PhpIncludeInspection */
            return file_exists($file)? require_once($file): false;
        });
    }

}