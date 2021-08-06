<?php

class Order
{
    private string $email;
    private string $street;
    private int $streetNumber;
    private int $zipcode;
    private string $city;
//    public string $order;

    function __construct(string $email, string $street, int $streetNumber, int $zipcode, string $city)
    {
        $this->email = $email;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->zipcode = $zipcode;
        $this->city = $city;
//        $this->order = $order;
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

//    public function getOrder()
//    {
//        return $this->order;
//    }

    public function confirmationMsg($productNames)
    {
        $message = "You picked the following useless products : <br> " . implode(", ", $productNames);
        $message .= "<br>";
        $message .= "Your email address : " . $this->email;
        $message .= "<br>";
        $message .= "Your address : " . $this->street . " " . $this->streetNumber . ", " . $this->zipcode . " " . $this->city;
        return $message;
    }
}






