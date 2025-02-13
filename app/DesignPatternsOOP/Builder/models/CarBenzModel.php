<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/12/2025
 * Time: 11:15 PM
 */

namespace App\DesignPatternsOOP\Builder\models;


class CarBenzModel extends Car
{
    private  $data =[];

    public  function setPart($name,$value){
        $this->data[$name] = $value;
    }
}