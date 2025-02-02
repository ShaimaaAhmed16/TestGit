<?php
//Traits/Index.php


trait LoggerTrait {
    public function logAction(string $message): void {
        echo "[LOG]: {$message}" . PHP_EOL;
    }
}

trait NotifiableTrait {
    public function sendNotification(string $message): void {
        echo "[NOTIFICATION]: {$message}" . PHP_EOL;
    }
}
// 🔹 الفئة الأساسية (مجردة)
abstract class basicEmployee {
protected string $name;
protected float $salary;

    public function __construct(string $name, float $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    abstract public function calculateSalary(): float;

    public function getDetails(): string {
        return "Name: {$this->name}, Salary: $" . $this->calculateSalary();
    }
}


// 🔹 فئة الموظف العادي (يستخدم NotifiableTrait)
class UserEmployee extends basicEmployee {
    use NotifiableTrait; // ✅ يستخدم الإشعارات

    public function calculateSalary(): float {
        return $this->salary;
    }
}

// 🔹 فئة المدير (يستخدم LoggerTrait و NotifiableTrait)
class ManagerEmployee extends basicEmployee {
    use LoggerTrait, NotifiableTrait; // ✅ يمكنه تسجيل الأحداث وإرسال الإشعارات

private float $bonus;

    public function __construct(string $name, float $salary, float $bonus) {
        parent::__construct($name, $salary);
        $this->bonus = $bonus;
    }

    public function calculateSalary(): float {
        return $this->salary + $this->bonus;
    }
}

// 🔹 فئة المتدرب (يستخدم LoggerTrait فقط)
class InternEmployee extends basicEmployee {
    use LoggerTrait; // ✅ يمكنه تسجيل الأحداث فقط

    public function calculateSalary(): float {
        return $this->salary; // عادةً يكون راتب المتدرب ثابتًا
    }
}

// ✅ تجربة الكود

$employee = new UserEmployee("Ali",2000);
echo $employee->getDetails()."  " .$employee->sendNotification("Your salary has been credited.") . PHP_EOL;

echo "------------------------" . PHP_EOL;
$manage = new ManagerEmployee("Shaimaa" ,60000,2000);

echo $manage->getDetails()."  " .$manage->logAction('Manager login and InternEmployee') ."  "
    .$manage->sendNotification('Your salary has been Cash'). PHP_EOL;

$intern = new InternEmployee('Ahmed',2000);
echo $intern->getDetails()."  " .$intern->logAction('InternEmployee add class'). PHP_EOL;