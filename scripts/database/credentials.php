<?php
 abstract class credentials {
     protected $host = '172.16.48.210';
     private $username = 'sputnik';
     private $password = 'Sp3tn1kC@';
     protected $database = 'db_hunter_facture_Angel_Velasco';
    public function  __get($name) {
        return $this->{$name};
    }
}
?>