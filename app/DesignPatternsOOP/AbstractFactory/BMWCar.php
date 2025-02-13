<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/3/2025
 * Time: 10:31 PM
 */

namespace App\DesignPatternsOOP\AbstractFactory;


class BMWCar implements NewCars
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function calculatePrice()
    {
       return $this->price+200000; // TODO: Implement calculatePrice() method.
    }
}