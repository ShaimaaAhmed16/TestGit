<?php

class Employee
{
    protected $name;
    protected $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getInfo()
    {
        return "Employee: {$this->name}, Salary: {$this->salary}";
    }
}

class Manager extends Employee
{
    private $department;

    public function __construct($name, $salary, $department)
    {
        parent::__construct($name, $salary);
        $this->department = $department;
    }

    public function getInfo()
    {
        return parent::getInfo() . ", Department: {$this->department}";
    }
}

class Developer extends Employee
{
    private $program;
    public function __construct($name, $salary, $program)
    {
        parent::__construct($name, $salary);
        $this->program = $program;
    }

    public function getInfo()
    {
        return parent::getInfo() . ", programmingLanguage: {$this->program}";
    }
}
class Intern extends Employee
{
    private $duration;
    public function __construct($name, $salary, $duration)
    {
        parent::__construct($name, $salary);
        $this->duration = $duration;
    }

    public function getInfo()
    {
        return parent::getInfo().",duration : {$this->duration}";
    }

}

//$manager = new Manager('shaimaa',12000,'programming');
//echo $manager->getInfo() . "<br>";
//
//// إنشاء كائن من Developer
//$developer = new Developer("Sara", 9000, "PHP");
//echo $developer->getInfo();

$intern = new Intern('Ahmed','2000','month');
echo  $intern->getInfo();