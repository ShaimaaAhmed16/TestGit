<?php
//apstractCtegory
use App\ClassAbstract\BMWCar;
use App\ClassAbstract\CarAbstractFactor;
//AbstractTesting
test('Create BMWCar', function () {
        $carAbstractFactory = new CarAbstractFactor(200000);
        $myCar = $carAbstractFactory->createBMWCar();
        $this->assertInstanceOf(BMWCar::class ,$myCar);

});
