<?php
class Customer extends connection
{
    use Singleton;
    public function __construct(
        private $customer_id,
        public $fullName,
        public $email,
        private $phone,
        private $address
    ) {
        parent::__construct();
    }

    
}

?>