<?php

class Order
{
    private string $email;
    private string $street;
    private int $streetNumber;
    private int $zipcode;
    private string $city;

    function __construct(string $email, string $street, int $streetNumber, int $zipcode, string $city)
    {
        $this->email = htmlspecialchars($email);
        $this->street = htmlspecialchars($street);
        $this->streetNumber = htmlspecialchars($streetNumber);
        $this->zipcode = htmlspecialchars($zipcode);
        $this->city = htmlspecialchars($city);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function getZipCode()
    {
        return $this->zipcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function confirmationMsg($productNames)
    {
        $message = "The following useless and/or priceless product(s) are in your cart: <br>" . implode(", <br>", $productNames) . "<br>";
        $message .= "<br>";
        $message .= "Your email address : " . $this->email;
        $message .= "<br>";
        $message .= "Your address : " . $this->street . " " . $this->streetNumber . ", " . $this->zipcode . " " . $this->city;

        // Return selected products and address data
        return "<div class='alert alert-success'>" . $this->confirmationMsg($productNames) . "</div>";    }
}






