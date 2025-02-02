<?php
interface DeliveryMethod{
    public function deliverOrder(string $orderDetails,string $size = null):string ;
    public function pay(float $amount):string ;
}

class MotorcycleDelivery implements DeliveryMethod{
    public function deliverOrder(string $orderDetails,string $size = null): string
    {
        $sizeText = $size ? " Siz: {$size}" : "";
        return "DeliveryMethod : Motorcycle , orderDetails: {$orderDetails} , {$sizeText}";  // TODO: Implement deliverOrder() method.
    }
    public function pay(float $amount): string
    {
        return "Paid $amount using cashPayment" ;// TODO: Implement pay() method.
    }
}

class CarDelivery implements DeliveryMethod{
    public function deliverOrder(string $orderDetails ,string $size = null): string
    {
        $sizeText = $size ? " Siz: {$size}" : "";
        return "DeliveryMethod :CarDelivery , orderDetails: {$orderDetails} , $sizeText";  // TODO: Implement deliverOrder() method.
    }
    public function pay(float $amount): string
    {
        return "Paid $amount using cashPayment" ;// TODO: Implement pay() method.
    }
}

class BicycleDelivery implements DeliveryMethod{
    public function deliverOrder(string $orderDetails,string $size = null): string
    {
        $sizeText = $size ? " Siz: {$size}" : "";
        return "DeliveryMethod :BicycleDelivery , orderDetails: {$orderDetails} , $sizeText";  // TODO: Implement deliverOrder() method.
    }
    public function pay(float $amount): string
    {
        return "Paid $amount using cashPayment" ;// TODO: Implement pay() method.
    }
}


$moter = new MotorcycleDelivery();
$car = new CarDelivery();

echo $moter->pay(200).' - ' .$moter->deliverOrder('pitza hot','min');
echo $car->pay(200).' - ' .$car->deliverOrder('pitza hot');
