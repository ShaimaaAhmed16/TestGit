<?php
// 🔹 1️⃣ كلاس تجريدي يمثل المركبة الأساسية
abstract class basicVehicle {
protected string $brand;
protected string $model;
protected int $year;

    public function __construct(string $brand, string $model, int $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    // 🔹 دالة تجريدية يجب أن تنفذها الفئات الفرعية
    abstract public function getFuelType(): string;

    // 🔹 دالة تعرض تفاصيل المركبة
    public function getDetails(): string {
        return "Brand: {$this->brand}, Model: {$this->model}, Year: {$this->year}, Fuel: " . $this->getFuelType();
    }
}

// 🔹 2️⃣ كلاس يمثل سيارة تعمل بالبنزين
class CarGas extends basicVehicle {
    public function getFuelType(): string {
        return "Gasoline";
    }
}

class ElectricCar extends basicVehicle {
    public function getFuelType(): string {
        return "Electric";
    }
}

// 🔹 4️⃣ كلاس يمثل دراجة نارية
class MotorcycleGas extends basicVehicle {
    public function getFuelType(): string {
        return "Gasoline";
    }
}

$car = new CarGas("Toyota", "Corolla", 2023);
$electricCar = new ElectricCar("Tesla", "Model S", 2022);
$motorcycle = new MotorcycleGas("Honda", "CBR600RR", 2021);

echo $car->getDetails() . PHP_EOL;
echo $electricCar->getDetails() . PHP_EOL;
echo $motorcycle->getDetails() . PHP_EOL;