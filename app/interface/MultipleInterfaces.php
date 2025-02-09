<?php
//php app/interface/MultipleInterfaces.php

interface PaymentMethodInterfaces{
    public function payData(float $amount):string ;
}

interface DeliveryMethodInterfaces{
    public function deliverOrder(string $orderDetails);
}

class CashPayment implements PaymentMethodInterfaces{
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function payData(float $amount): string
    {
       return "pid : {$amount},PaymentMethod : {$this->method}"; // TODO: Implement payData() method.
    }

}
class CreditCardPaymentInterfaces implements PaymentMethodInterfaces{
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function payData(float $amount): string
    {
       return "pid : {$amount},PaymentMethod : {$this->method}"; // TODO: Implement payData() method.
    }

}

class MotorcycleDeliveryInterfaces implements DeliveryMethodInterfaces{
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }
    public function deliverOrder(string $orderDetails)
    {
        return "Order : {$orderDetails},DeliveryMethod: {$this->method}"; // TODO: Implement deliverOrder() method.
    }
}
class CarDeliveryInterfaces implements DeliveryMethodInterfaces{
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }
    public function deliverOrder(string $orderDetails)
    {
        return "Order : {$orderDetails},DeliveryMethod: {$this->method}"; // TODO: Implement deliverOrder() method.
    }
}

class OrderProcessor {
    private PaymentMethodInterfaces $paymentMethod;
    private DeliveryMethodInterfaces $deliveryMethod;
    public function __construct(PaymentMethodInterfaces $paymentMethod,DeliveryMethodInterfaces $deliveryMethod)
    {
        $this->paymentMethod = $paymentMethod;
        $this->deliveryMethod = $deliveryMethod;
    }

    public function processOrder(float $amount, string $orderDetails): string {
        $paymentStatus = $this->paymentMethod->payData($amount);
        $deliveryStatus = $this->deliveryMethod->deliverOrder($orderDetails);

        return $paymentStatus . " - " . $deliveryStatus;
    }

}


$paymentMethod = new CashPayment("Cash");
$deliveryMethod = new MotorcycleDeliveryInterfaces("Motorcycle");
// إنشاء معالج الطلبات وتمرير الطرق
$orderProcessor = new OrderProcessor($paymentMethod, $deliveryMethod);

// تنفيذ عملية الطلب
echo $orderProcessor->processOrder(100.5, "Pizza Hot");