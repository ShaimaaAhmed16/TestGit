<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/12/2025
 * Time: 11:46 PM
 */

namespace App\DesignPatternsOOP\Builder;


use App\DesignPatternsOOP\Builder\models\Car;

class CarProducer
{
    /**
     * @var CarBuilderInterface
     * */
    private $builder;
    public function __construct(CarBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function producerCar():Car{

        $this->builder->createCar();
        $this->builder->addBody();
        $this->builder->addEngine();
        $this->builder->addDoors();
        $this->builder->addWheels();
       return $this->builder->getCar();
    }

}