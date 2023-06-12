<?php
class Seller {
    use Singleton;
    public function __construct(protected $name) {}
}