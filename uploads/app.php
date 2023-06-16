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
        public static $instance;
        public function __construct($arg) {}
        public static function getInstance(...$arg) {
            $arg = func_get_args();
            $arg = array_pop($arg);
            return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;        
        }

         function __set($name, $value) {
            $this->$name = $value;
        }
         function __get($name) {
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
            dirname(__DIR__).'/scripts/database/',
            dirname(__DIR__).'/scripts/bill/',
            dirname(__DIR__).'/scripts/seller/',
            dirname(__DIR__).'/scripts/customer/',
            dirname(__DIR__).'/scripts/products/',
        ];
        $classFile = str_replace('\\', '/', $class) . 'php';

        foreach ($allDirectories as $directory) {
            $file = $directory . $classFile;
            return (file_exists($file)) ? require $file : null;     
        }
    }
    spl_autoload_register('autoLoad');

    /* Get Customer Data */
    Customer::getInstance(json_decode(file_get_contents('php://input'), true));
  
?>