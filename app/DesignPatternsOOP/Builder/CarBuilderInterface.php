<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/12/2025
 * Time: 10:48 PM
 */

namespace App\DesignPatternsOOP\Builder;
use App\DesignPatternsOOP\Builder\models\Car;

interface CarBuilderInterface
{
    public function createCar();
    public function addEngine();
    public function addBody();
    public function addDoors();
    public function addWheels();
    public function getCar():Car;

}