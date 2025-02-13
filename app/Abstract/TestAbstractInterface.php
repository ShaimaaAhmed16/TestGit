<?php
//TestAbstractInterface

// 🔹 1️⃣ كلاس تجريدي يمثل الموظف الأساسي
abstract class Employee {
protected string $name;
protected float $salary;

    public function __construct(string $name, float $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    // 🔹 دالة تجريدية يجب أن تنفذها الفئات الفرعية لحساب الراتب
    abstract public function calculateSalary(): float;

    // 🔹 دالة تعرض تفاصيل الموظف
    public function getDetails(): string {
        return "Name: {$this->name}, Salary: $" . $this->calculateSalary();
    }
}

// 🔹 2️⃣ واجهة (Interface) للموظفين الذين يمكنهم توقيع العقود
interface Signable {
    public function signContract(): string;
}
interface Reportable {
    public function reports(): string;
}

// 🔹 3️⃣ فئة الموظف العادي (يَرِث من Employee لكنه لا يطبق Signable)
class RegularEmployee extends Employee {
    public function calculateSalary(): float {
        return $this->salary; // راتب ثابت
    }
}
class FreelancerEmployee extends Employee implements Reportable{
private float $projectPay;

    public function __construct(string $name, float $projectPay) {
        parent::__construct($name,0);
        $this->projectPay = $projectPay;
    }
    public function calculateSalary(): float {
        return $this->projectPay; // راتب ثابت
    }

    public function reports(): string
    {
        return "Reporting : {$this->name}" ;
    }
}

// 🔹 4️⃣ فئة المدير (يَرِث من Employee ويطبق Signable)
class Manager extends Employee implements Signable {
private float $bonus;

    public function __construct(string $name, float $salary, float $bonus) {
        parent::__construct($name, $salary);
        $this->bonus = $bonus;
    }

    public function calculateSalary(): float {
        return $this->salary + $this->bonus; // الراتب الأساسي + المكافأة
    }

    public function signContract(): string {
        return "{$this->name} (Manager) signed a contract.";
    }
}

// 🔹 5️⃣ فئة المستشار (يَرِث من Employee ويطبق Signable)
class Consultant extends Employee implements Signable {
private int $hoursWorked;
private float $hourlyRate;

    public function __construct(string $name, float $hourlyRate, int $hoursWorked) {
        parent::__construct($name,0);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculateSalary(): float {
        return $this->hourlyRate * $this->hoursWorked; // الدفع بالساعة
    }

    public function signContract(): string {
        return "{$this->name} (Consultant) signed a contract.";
    }
}

// ✅ **تجربة الكود**
$employee = new RegularEmployee("Ahmed", 3000);
$manager = new Manager("Sara", 5000, 2000);
$consultant = new Consultant("Ali", 50, 160);
$freelance = new FreelancerEmployee("shaimaa",50000);

echo $employee->getDetails() . PHP_EOL; // موظف عادي
echo $manager->getDetails() . PHP_EOL;  // مدير
echo $consultant->getDetails() . PHP_EOL; // مستشار
echo $freelance->getDetails()."  " . $freelance->reports(). PHP_EOL; //

echo "-----------------------------" . PHP_EOL;

// ✅ تجربة التوقيع على العقد
echo $manager->signContract() . PHP_EOL; // المدير يوقع العقد
echo $consultant->signContract() . PHP_EOL; // المستشار يوقع العقد
