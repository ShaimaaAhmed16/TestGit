<?php
class A {
   public function doSomething() {
        echo "Just doing something!";
    }
}

class B extends A {
   public function doSometing() {
        echo "Just do it!";
    }
}

class C extends B {
   public function runDoSomething() {
      // return parent::doSometing();
       $a = new A();
       return  parent::doSometing() .", OR ". $a->doSomething();
   }
}

$c = new C();
//echo $c->runDoSomething();

class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry? ";
    }
}
$strawberry = new Strawberry("Strawberry", "red");
//echo $strawberry->message();
//echo $strawberry->intro();

