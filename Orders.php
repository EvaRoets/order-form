<?php

class Contacts
{
    private string $email;
    private string $street;
    private int $streetNumber;
    private int $zipcode;
    private string $city;
    public string $order;

    public function __construct(string $email, string $street, int $streetNumber, int $zipcode, string $city, string $order)
    {
        $this->email = $email;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->order = $order;
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
    public function getOrder()
    {
        return $this->order;
    }




}






