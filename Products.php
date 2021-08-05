<?php

class Products
{
    public string $name;
    public float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function getInfo()
    {
        echo "Name: {$this->name}</br>";
        echo "Price: {$this->price}</br>";
    }

}

?>






