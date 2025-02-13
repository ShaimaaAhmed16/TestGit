<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/13/2025
 * Time: 12:34 AM
 */

namespace App\DesignPatternsOOP\FactoryMethod;


class BMWBrandFactory implements BrandFactory
{
    public function getBrand()
    {
       return new BMWBrand();
    }
}