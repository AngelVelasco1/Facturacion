<!-- Singleton Example -->
<?php
trait Singleton
{
    private static $instance;
    /* Prevent direct instantiation */
    private function __construct($arg)
    {
    }
    /* Return the singleton instance to allow a global access */
    public static function getInstance(...$arg)
    {
        $args = func_get_args();
        $arg = array_pop($args);

        return self::$instance ??= new static(...$arg);
    }
}

class Human
{
    /* Ensure an only instance */
    use Singleton;
    function __construct(public $name, public $lastName, protected $age, protected $id)
    {
    }
    public function getHumanData()
    {
        return $this->name . ' ' . $this->lastName . ' is ' . $this->age . ' years old, her/his ID is ' . $this->id . '</br>';
    }
}
class Animal
{
    /* Ensure an only instance */
    use Singleton;
    function __construct(public $name, public $race)
    {
    }
    public function getAnimalData()
    {
        return $this->name . ' is a ' . $this->race;
    }
}
// Create a new instance of the class and print the data.
print_r(Human::getInstance(['name' => 'Angel', 'lastName' => 'Velasco', 'age' => 17, 'id' => 102787133]) -> getHumanData());
print_r(Animal::getInstance(['name' => 'Tobi', 'race' => 'Feline']) -> getAnimalData());
?>