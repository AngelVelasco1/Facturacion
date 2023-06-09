<?php
    /* CONFIG */
    header("Content-Type: application/json; charset=UTF-8");
    $_HEADER = apache_request_headers();
    $_METHOD = $_SERVER['REQUEST_METHOD'];
    $_DATA = json_decode(file_get_contents('php://input', true));

    /* Singleton */
    trait Singleton {
        private static $instance;
        private function __construct($args) {}
        public static function getInstance(...$args) {
            return self::$instance ??= new static (...$args);
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
        public function __get($name) {
            return $this->$name;
        }
    }

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