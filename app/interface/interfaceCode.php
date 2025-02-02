<?php

interface DataCode{
    public function move(): string;
    public function stop(): string;
}

class CarData implements DataCode{
    private string $brand;
    public function __construct(string $brand) {
        $this->brand = $brand;
    }

    public function move(): string {
        return "{$this->brand} Car is moving on the road.";
    }

    public function stop(): string {
        return "{$this->brand} Car has stopped.";
    }
}
class MotorcycleData implements DataCode{
    private string $model;
    public function __construct(string $model) {
        $this->model = $model;
    }
    public function move(): string
    {
        return "{$this->model} Motorcycle move"; // TODO: Implement move() method.
    }
    public function stop(): string
    {
        return "{$this->model} Motorcycle stop";  // TODO: Implement stop() method.
    }
}

$car = new CarData('mpw');
echo $car->move()." - " . $car->stop();