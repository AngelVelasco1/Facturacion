<?php
    interface environment {
        public function __get($name);
    }
    abstract class connection extends credentials implements environment {
        use Singleton;
        protected $connect;
        function __construct(private $driver = 'mysql', private $port = 3306) {
            try {
                $this->connect = new PDO($this->driver.":host=".$this->__get('host').";port=".$this->port.";database=".$this->__get('database').";user=".$this->username.";password=".$this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                    $this->connect = $e->getMessage();
            }
        }
    }
?>