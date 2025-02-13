<?php
//apstractCtegory

use App\DesignPatternsOOP\AbstractFactory\BMWCar;
use App\DesignPatternsOOP\AbstractFactory\CarAbstractFactor;
use App\DesignPatternsOOP\Builder\BMWCarBuilder;
use App\DesignPatternsOOP\Builder\CarProducer;
use App\DesignPatternsOOP\Builder\models\CarBMWModel;
use App\DesignPatternsOOP\FactoryMethod\BMWBrand;
use App\DesignPatternsOOP\FactoryMethod\BMWBrandFactory;
use App\DesignPatternsOOP\POOl\Car;
use App\DesignPatternsOOP\POOL\CarPool;

//Abstract Factory
test('Create BMWCar', function () {
        $carAbstractFactory = new CarAbstractFactor(200000);
        $myCar = $carAbstractFactory->createBMWCar();
        $this->assertInstanceOf(BMWCar::class ,$myCar);

});
// Builder
test('producer BMWCar', function () {
        $builder = new BMWCarBuilder();
        $car_producer = new CarProducer($builder);
        $myCar = $car_producer->producerCar();
//        $this->assertInstanceOf(CarBMWModel::class ,$myCar);

});

//Factory Method
test('factory BMWCar', function () {
    $brand = new BMWBrandFactory();
    $myCar = $brand->getBrand();
    $this->assertInstanceOf(BMWBrand::class ,$myCar);

});
//Pool Method

//test('Pool BMWCar', function () {
//    private  $carPool;
//    $this->carPool = new CarPool();
//    $myCar = $this->carPool->rentCar();
//    $this->assertInstanceOf( Car::class , $myCar);
//    $this->assertEquals(1,$this->carPool->getReport());
//});