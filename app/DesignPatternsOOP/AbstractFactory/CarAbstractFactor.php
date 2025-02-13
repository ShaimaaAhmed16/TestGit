<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/3/2025
 * Time: 10:42 PM
 */
//php app/ClassAbstract/CarAbstractFactor.php

namespace App\DesignPatternsOOP\AbstractFactory;


class CarAbstractFactor
{
    private $price;
    private $tax = 10000;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function createBMWCar(): BMWCar
    {
       $pmw_car = new BMWCar($this->price);
        return $pmw_car;
    }
    public function createBenzCar(): BenzCar
    {
       $benz_car = new BenzCar($this->price,$this->tax);
        return $benz_car;
    }
}

//$bmw = new CarAbstractFactor(20000);
//echo $bmw->createBMWCar();