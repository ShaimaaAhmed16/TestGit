<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/3/2025
 * Time: 11:13 PM
 */

namespace App\Tests;


use App\ClassAbstract\BenzCar;
use App\ClassAbstract\BMWCar;
use App\ClassAbstract\CarAbstractFactor;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function sortId(): string{}
    public function provides(): array{}
    public function requires(): array{}
//    public function toString(): string{}

    public function testCanCreateBMWCar(){
        $carAbstractFactory = new CarAbstractFactor(200000);
        $myCar = $carAbstractFactory->createBMWCar();
        $this->assertInstanceOf(BMWCar::class ,$myCar);
    }

}