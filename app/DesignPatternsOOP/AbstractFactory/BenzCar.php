<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/3/2025
 * Time: 10:35 PM
 */

namespace App\DesignPatternsOOP\AbstractFactory;


class BenzCar implements NewCars
{
    private $price;
    private $tax;

    public function __construct($price,$tax)
    {
        $this->price = $price;
        $this->tax = $tax;
    }

    public function calculatePrice()
    {
        return $this->price+$this->tax+250000;
    }

}