<?php
//Payment
interface PaymentMethod{
    public function pay(float $amount):string;
}

class CreditCardPayment implements PaymentMethod{
    private string $cardNumber;
    public function __construct(string $cardNumber) {
        $this->cardNumber = $cardNumber;
    }

    public function pay(float $amount): string {
        return "Paid $amount using Credit Card (Card Number: {$this->cardNumber}).";
    }
}

class PayPalPayment implements PaymentMethod{

    private string $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function pay(float $amount): string {
        return "Paid $amount using PayPal (Email: {$this->email}).";
    }
}

class BankTransferPayment implements PaymentMethod {
    private string $bankAccount;
    public function __construct(string $bankAccount) {
        $this->bankAccount = $bankAccount;
    }
    public function pay(float $amount): string {
        return "Paid $amount using Bank Transfer (Account Number: {$this->bankAccount}).";
    }
}

$credit = new CreditCardPayment('0000');
echo $credit->pay(100)." - ";

$payPal =new PayPalPayment('shaimaa@gmail.com');
echo $payPal->pay(1000)." - ";

$bank =new BankTransferPayment('1200033');
echo $bank->pay(1000);