<?php
class customer extends connection
{
    use Singleton;

    private $queryPost = 'INSERT INTO customer(customer_id, fullName, email, phone, address) VALUES (:id, :name, :email, :phone, :address)';
    private $message;

    function __construct(private $customer_id, public $fullName, public $email, private $phone, private $address) {
        parent::__construct();
    }
    public function postCustomer() {
        try {
            $sentence = $this->connect->prepare($this->queryPost);


            $sentence->bindValue("id", $this->customer_id);
            $sentence->bindValue("name", $this->fullName);
            $sentence->bindValue("email", $this->email);
            $sentence->bindValue("phone", $this->phone);
            $sentence->bindValue("address", $this->address);

            $sentence->exectute();
            
            $this->message =['Code' => 200 + $sentence->rowCount(), 'Message'=> 'Inserted Data'];
        }
        catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $sentence->errorInfo()[2]];
        }
        finally {
            print_r($this->message);
        }
    }
}

?>