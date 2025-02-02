<?php
interface C {
    public function insideC();
}

interface B {
    public function insideB();
}

class Multiple implements B, C {

    // Function of the interface B
    function insideB() {
        echo "\nI am in interface B";
    }

    // Function of the interface C
    function insideC() {
        echo "\nI am in interface C";
    }

    public function insidemultiple()
    {
        echo "\nI am in inherited class";
    }
}

//$geeks = new multiple();
//$geeks->insideC();
//$geeks->insideB();
//$geeks->insidemultiple();

//////////////////////////////////

class FoodObject
{
    protected $food ;
    public function __construct($food)
    {
        $this->food = $food;
    }

    public function Food(){
        return "Eating : {$this->food}";
    }
}
class SongObject
{
    protected $song ;
    public function __construct($song)
    {
        $this->song = $song;
    }

    public function Song(){
        return "Song : {$this->song}";
    }
}

interface Talks
{
    public function say(string $message);
}
interface Eats
{
    public function putInMouth(FoodObject $food);
}
interface Human extends Talks, Eats
{
    public function singsOffKey(SongObject $song);
}

class HumanProcessor implements Human{
    public function say(string $message)
    {
        echo "Speaking: $message\n";
    }

    // تنفيذ الدالة من Eats
    public function putInMouth(FoodObject $food)
    {
        echo $food->Food() . "\n";
    }

    // تنفيذ الدالة من Human
    public function singsOffKey(SongObject $song)
    {
        echo $song->Song() . " (out of key!)\n";
    }
}

$human = new HumanProcessor();

$human->say("Hello, world!"); // Speaking: Hello, world!
$human->putInMouth(new FoodObject("Pizza")); // Eating : Pizza
$human->singsOffKey(new SongObject("Despacito"));

/////////////////////////////////////////////////////
interface PaymentInterface{
    public function processPayment(float $amount): string;
}
interface DeliveryInterface{
    public function processDelivery(string $orderDetails):string;
}

interface InvoiceMethodInterface{
    public function generateInvoice(): string;
}

class CashPay implements PaymentInterface{
public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function processPayment(float $amount): string
    {
        return "pid : {$amount},PaymentMethod : {$this->method}"; // TODO: Implement payData() method.
    }
}
class CreditCardPay implements PaymentInterface{
public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function processPayment(float $amount): string
    {
        return "pid : {$amount},PaymentMethod : {$this->method}"; // TODO: Implement payData() method.
    }

}

class MotorcycleDelivery implements DeliveryInterface{
    public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }
    public function processDelivery(string $orderDetails):string
    {
        return "Order : {$orderDetails},DeliveryMethod: {$this->method}"; // TODO: Implement deliverOrder() method.
    }
}
class CarDelivery implements DeliveryInterface{
public string $method;
    public function __construct(string $method)
    {
        $this->method = $method;
    }
    public function processDelivery(string $orderDetails):string
    {
        return "Order : {$orderDetails},DeliveryMethod: {$this->method}"; // TODO: Implement deliverOrder() method.
    }
}

class OrderInvoice implements InvoiceMethodInterface{
    public int $number ;
    public function generateInvoice():string {
        return  "Number : {$this->number}";
    }
}

class OrderInvoiceProcessor{
    private DeliveryInterface $delivery;
    private PaymentInterface $payment;
    private InvoiceMethodInterface $invoice;

    public function __construct(DeliveryInterface $delivery,PaymentInterface $payment,InvoiceMethodInterface $invoice)
    {
        $this->delivery = $delivery;
        $this->payment = $payment;
        $this->invoice = $invoice;
    }

    public function processOrder(float $amount, string $orderDetails){
        $delivery_orders = $this->delivery->processDelivery($orderDetails);
        $payment_orders = $this->payment->processPayment($amount);
        $invoice_orders = $this->invoice->generateInvoice();

        return $delivery_orders.' - '.$payment_orders.' - '.$invoice_orders;
    }

}
$paymentMethod = new CashPay("Cash");
$deliveryMethod = new MotorcycleDelivery("Motorcycle");
$invoiceMethod = new OrderInvoice();
$invoiceMethod->number = 2 ;
$process = new OrderInvoiceProcessor($deliveryMethod,$paymentMethod,$invoiceMethod);

echo $process->processOrder(200, "Pizza Hot"). "\n";

class OrderS implements PaymentInterface, DeliveryInterface, InvoiceMethodInterface {
    private $paymentMethod;
    private $deliveryMethod;
    private $invoiceMethod;

    public function __construct(PaymentInterface $paymentMethod, DeliveryInterface $deliveryMethod, InvoiceMethodInterface $invoiceMethod) {
        $this->paymentMethod = $paymentMethod;
        $this->deliveryMethod = $deliveryMethod;
        $this->invoiceMethod = $invoiceMethod;
    }

    public function processPayment(float $amount): string {
        return $this->paymentMethod->processPayment($amount);
    }

    public function processDelivery(string $orderDetails): string {
        return $this->deliveryMethod->processDelivery($orderDetails);
    }

    public function generateInvoice(): string {
        return $this->invoiceMethod->generateInvoice();
    }
}

$paymentMethod = new CashPay("cash");
$deliveryMethod = new MotorcycleDelivery("Motorcycle");
$invoiceMethod = new OrderInvoice();

$orderProcessor = new OrderS($paymentMethod, $deliveryMethod, $invoiceMethod);
$invoiceMethod->number = 2 ;
// عملية الدفع
echo $orderProcessor->processPayment(150.5) . "\n";
// عملية التوصيل
echo $orderProcessor->processDelivery("Pizza Order") . "\n";
// إنشاء الفاتورة
echo $orderProcessor->generateInvoice() . "\n";

/////////////////////////////////////////////

// 2. تعريف الفئة الأساسية للطلبات (Superclass)
abstract class Order {
protected string $orderDetails;
protected float $amount;
protected int $num;

    public function __construct(string $orderDetails, float $amount,int $num) {
        if ($num <= 0) {
            throw new InvalidArgumentException("Quantity must be greater than zero.");
        }
        $this->orderDetails = $orderDetails;
        $this->amount = $amount;
        $this->num = $num;
    }

    public function getTotalAmount(): float {
        return $this->amount * $this->num;
    }

    public function getOrderSummary(): string {
        return "Order Details: {$this->orderDetails}, Total Amount: {$this->getTotalAmount()}";
    }
}

// 3. فئة الطلب العادي (لا تحتاج إلى توصيل أو فاتورة)
class RegularOrder extends Order implements PaymentInterface {
    public function processPayment(float $amount): string {
        return "Payment of {$this->getTotalAmount()} processed for Regular Order.";
    }
}

// 4. فئة طلب التوصيل (يحتاج إلى دفع وتوصيل)
class DeliveryOrder extends Order implements PaymentInterface, DeliveryInterface {
private string $deliveryMethod;

    public function __construct(string $orderDetails, float $amount, string $deliveryMethod,int $num) {
        parent::__construct($orderDetails, $amount,$num);
        $this->deliveryMethod = $deliveryMethod;
    }

    public function processPayment(float $amount): string {
        return "Payment of {$this->getTotalAmount()} processed for Delivery Order.";
    }

    public function processDelivery(string $orderDetails): string {
        return "Order '{$orderDetails}' is being delivered via {$this->deliveryMethod}.";
    }
}

// 5. فئة طلب VIP (يحتاج إلى دفع، توصيل، وفاتورة)
class VipOrder extends Order implements PaymentInterface, DeliveryInterface, InvoiceMethodInterface {
private string $deliveryMethod;
private int $invoiceNumber;

    public function __construct(string $orderDetails, float $amount, string $deliveryMethod, int $invoiceNumber,int $num) {
        parent::__construct($orderDetails, $amount,$num);
        $this->deliveryMethod = $deliveryMethod;
        $this->invoiceNumber = $invoiceNumber;
    }

    public function processPayment(float $amount): string {
        return "VIP Payment of {$this->getTotalAmount()} processed.";
    }

    public function processDelivery(string $orderDetails): string {
        return "VIP Order '{$orderDetails}' is being delivered via {$this->deliveryMethod}.";
    }

    public function generateInvoice(): string {
        return "Invoice #{$this->invoiceNumber} generated for VIP Order.";
    }
}

// ** تجربة الكود **

// 1. طلب عادي
$regularOrder = new RegularOrder("Burger & Fries", 50,1);
echo $regularOrder->getOrderSummary() . PHP_EOL;
echo $regularOrder->processPayment(50) . PHP_EOL;

echo "------------------------" . PHP_EOL;

// 2. طلب توصيل
$deliveryOrder = new DeliveryOrder("Pizza & Soda", 100, "Motorcycle",2);
echo $deliveryOrder->getOrderSummary() . PHP_EOL;
echo $deliveryOrder->processPayment(100) . PHP_EOL;
echo $deliveryOrder->processDelivery("Pizza & Soda") . PHP_EOL;

echo "------------------------" . PHP_EOL;

// 3. طلب VIP
$vipOrder = new VipOrder("Steak & Wine", 250, "Luxury Car", 12345,3);
echo $vipOrder->getOrderSummary() . PHP_EOL;
echo $vipOrder->processPayment(250) . PHP_EOL;
echo $vipOrder->processDelivery("Steak & Wine") . PHP_EOL;
echo $vipOrder->generateInvoice() . PHP_EOL;