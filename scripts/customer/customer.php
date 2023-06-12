<?php
class Customer
{
    use Singleton;

    public function __construct(
        protected $id,
        public $fullName,
        public $email,
        public $phone,
        private $address
    ) {}

    public function getId() {
        return $this->id;
    }
    public function getfullName() {
        return $this->fullName;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getAddress() {
        return $this->address;
    }
    
    
}
?>