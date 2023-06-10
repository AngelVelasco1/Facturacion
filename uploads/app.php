<?php
    /* CONFIG */
    header("Content-Type: application/json; charset=UTF-8");
    $allConfig = [
        "_HEADER" => apache_request_headers(),
        "_METHOD" => $_SERVER['REQUEST_METHOD'],
        "_DATA " => json_decode(file_get_contents('php://input', true))
    ];

    /* Singleton */
    trait Singleton {
        private static $instance;
        private function __construct($arg) {}
        public static function getInstance(...$arg) {
            $args = func_get_args();
            $arg = array_pop($args);
            return self::$instance ??= new static (...$arg);
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }
        public function __get($name) {
            return $this->$name;
        }
    }
    /* API */
    class Api {
        use Singleton;
        private function __construct(private $_METHOD, private $_DATA){
            $this->_METHOD = $_METHOD;
            $this->DATA = $_DATA;
        }

        public function handleRequest() {
            $checkMethod = match($this->METHOD) {
                "POST" => $this->handlePostRequest(),
                default => null
            };
            return $checkMethod;
        }
        private function handlePostRequest() {
            return customerDetails($this->_DATA['customerDetails'] ?? null);
        }

    }
    function customerDetails($data) {}
    function sellerDetails($data) {}
    function productDetails($data) {}

    /* AutoLoad */
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

    /* Get Config (Instance) */
    $instance = Api::getInstance($allConfig);
    $res = $instance->handleRequest();
    echo json_encode($res);
?>