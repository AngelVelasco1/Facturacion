<?php 
class Products {
    use Singleton;

    public function __construct(public $productCode, public $producName, public $amount, public $standardValue) {}
}