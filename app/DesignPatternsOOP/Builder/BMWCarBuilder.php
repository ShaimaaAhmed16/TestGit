<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/12/2025
 * Time: 11:20 PM
 */

namespace App\DesignPatternsOOP\Builder;


use App\DesignPatternsOOP\Builder\models\Car;
use App\DesignPatternsOOP\Builder\models\CarBMWModel;

class BMWCarBuilder implements CarBuilderInterface
{
    /**
     * @var Car $type
     * */
    private $type;
    public function createCar()
    {
        $this->type = new CarBMWModel();
    }

    public function addBody()
    {
        $this->type->setPart('Body','BMW-body');
    }
    public function addEngine()
    {
        $this->type->setPart('Engine','BMW-engine');
    }
    public function addDoors()
    {
        $this->type->setPart('Doors','BMW-doors');
    }

    public function addWheels()
    {
        $this->type->setPart('Wheels','BMW-wheels');
    }
    public function getCar():Car
    {
       return $this->type;
    }
}