<?php
class Animal {
    public $name;
    protected $species = "Unknown";
    public function __construct($name) {
        $this->name = $name;
    }

    public function makeSound() {
        return "Some generic sound";
    }

    protected function getSpecies() {
        return $this->species;
    }
}
class Dog extends Animal {
    public function makeSound() {
        return parent::makeSound() . " and Meow!";
    }
}


class Lion extends Animal {
    public function showSpecies() {
        return "This is a " . $this->getSpecies();
    }
}

$lion = new Lion("loin");
echo $lion->showSpecies();
// إنشاء كائن من الفئة Dog
//$dog = new Dog("Buddy");
//echo $dog->name . " says: " . $dog->makeSound(); // Buddy says: Bark!