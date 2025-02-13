<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/13/2025
 * Time: 12:35 AM
 */

namespace App\DesignPatternsOOP\FactoryMethod;


class BenzBrandFactory implements BrandFactory
{
    public function getBrand()
    {
        return new BenzBrand();
    }
}