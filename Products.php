<?php

class Products
{
    public string $name;
    public float $price;

    function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function formattedPrice()
    {
        return "€". number_format($this->price, 2);
    }


}