<?php

class Contacts
{
    private string $email;
    private string $street;
    private int $streetNumber;
    private int $zipcode;
    private string $city;

    public function __construct(string $email, string $street, int $streetNumber, int $zipcode, string $city)
    {
        $this->email = $email;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->zipcode = $zipcode;
        $this->city = $city;
    }
    public function getContactInfogit()
    {
        return $this->email;
        return $this->street;
        return $this->streetNumber;
        return $this->zipcode;
        return $this->city;
    }

}

?>




