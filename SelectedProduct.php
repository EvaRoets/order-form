<?php

class SelectedProduct
{
    public string $customer;
    public string $product;
    public float $totalValue;

    function __construct(string $customer = "", string $product, float $totalValue)
    {
        $this->customer = $customer;
        $this->product = $product;
        $this->totalValue = $totalValue;
    }
    public function productsInCart($productNames)
    {
        $message = "The following useless and/or priceless product(s) are in your cart: <br>" . implode(", <br>", $productNames) . "<br>";
        return $message;
    }

    public function totalPrice()
    {
        return "You already ordered <strong>&euro;" . $this->totalPrice() . "</strong>in useless and/or priceless products.";
    }

}