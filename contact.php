<?php

class Contacts
{
    public string $email;
    public string $street;
    public int $streetNumber;
    public int $zipcode;
    public string $city;

    public function __construct(string $email, string $street, int $streetNumber, int $zipcode, string $city)
    {
        $this->email = $email;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->zipcode = $zipcode;
        $this->city = $city;
    }
    public function getInfo()
    {
        return $this->email;
        return $this->street;
        return $this->streetNumber;
        return $this->zipcode;
        return $this->city;
    }

}

?>






