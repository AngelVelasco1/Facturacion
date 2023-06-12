<?php
class Bill {
    use Singleton;

    public function __construct(public $billNumber, public $billDate) {}
}