<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/13/2025
 * Time: 12:24 AM
 */

namespace App\DesignPatternsOOP\FactoryMethod;


class BenzBrand implements CarBrandInterface
{
    public function createBrand()
    {
        return "Benz Brand";
    }

}