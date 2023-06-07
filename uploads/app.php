<?php
    function autoLoad($class) {
        $allDirectories = [
            dirname(__DIR__).'/scripts/db/',
            dirname(__DIR__).'/scripts/seller/',
            dirname(__DIR__).'/scripts/client/',
            dirname(__DIR__).'/scripts/product/',
        ];
        $classFile = str_replace('\\', '/', $class) . 'php';

        foreach ($allDirectories as $directory) {
            $file = $directory . $classFile;

            return (file_exists($file)) ? require $file : null; 
            
        }
    }
    spl_autoload_register('autoLoad');
?>