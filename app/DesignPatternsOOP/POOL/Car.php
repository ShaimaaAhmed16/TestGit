<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/13/2025
 * Time: 1:17 AM
 */

namespace App\DesignPatternsOOP\POOL;


class Car
{
    private  $rentAt;

    public function __construct()
    {
        $this->rentAt = new \DateTime();
    }

    public  function  moveCar(){
        return "car is moving ";
    }
}