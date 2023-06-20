<?php
 abstract class credentials {
     protected $host = '127.0.0.1';
     private $user = 'root';
     private $password = '';
     protected $dbname = 'db_hunter_facture_Angel_Velasco';
    public function  __get($name) {
        return $this->{$name};
    }
}
?>