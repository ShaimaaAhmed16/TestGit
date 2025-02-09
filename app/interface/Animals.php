<?php
interface Animal {
    public function makeSound();
}

class Cat implements Animal{
    public function makeSound()
    {
       return "Cat Sound Meow" ; // TODO: Implement makeSound() method.
    }
}

class Dog implements Animal{
    public function makeSound()
    {
       return "Dog Sound Bark" ; // TODO: Implement makeSound() method.
    }
}
class Mouse implements Animal{
    public function makeSound()
    {
       return "Mouse Sound Squeak" ; // TODO: Implement makeSound() method.
    }
}

$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);
foreach($animals as $animal) {
   echo $animal->makeSound().' - ';
}