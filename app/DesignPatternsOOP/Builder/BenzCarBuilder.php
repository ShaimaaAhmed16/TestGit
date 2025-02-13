<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/12/2025
 * Time: 11:20 PM
 */

namespace App\DesignPatternsOOP\Builder;


use App\DesignPatternsOOP\Builder\models\Car;
use App\DesignPatternsOOP\Builder\models\CarBenzModel;

class BenzCarBuilder implements CarBuilderInterface
{
    /**
   * @var Car $type
     * */
    private $type;
    public function createCar()
    {
        $this->type = new CarBenzModel();
    }

    public function addBody()
    {
        $this->type->setPart('Body','body');
    }
    public function addEngine()
    {
        $this->type->setPart('Engine','engine');
    }
    public function addDoors()
    {
        $this->type->setPart('Doors','doors');
    }

    public function addWheels()
    {
        $this->type->setPart('Wheels','wheels');
    }
    public function getCar():car
    {
        return $this->type;
    }


}