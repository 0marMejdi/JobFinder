<?php
class Company
{
// attributes are Description (string), Sector (string), Size (int), HasLogo (boolean) , Email (string) , Password (string), Name (string), FoundationDate (string), PhoneNumber (string), Country (string), State (string), Address (string)
    public string $email, $name, $password, $personType, $description, $sector, $foundationDate, $country, $state, $address,$phoneNumber;
    public bool $hasLogo;
    public int $size;

    public function __construct(string $name = "", string $email = "", string $password = "", string $description = "", string $sector = "", int $size = 1 , string $foundationDate = "", string $phoneNumber = "", string $country = "", string $state = "", string $address = "")
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->hasLogo = false;
        $this->description = $description;
        $this->sector = $sector;
        $this->size = $size;
        $this->foundationDate = $foundationDate;
        $this->phoneNumber = $phoneNumber;
        $this->country = $country;
        $this->state = $state;
        $this->address = $address;
        $this->personType = "Company";
    }

    public function __toString(): string
    {
        $str  = "Name: " . $this->name . "<br>";
        $str .= "Email: " . $this->email . "<br>";
        $str .= "Password: " . $this->password . "<br>";
        $str .= "Person Type: " . $this->personType . "<br>";
        $str .= "Has Logo: " . ($this->hasLogo ? "Yes" : "No") . "<br>";
        $str .= "Description: " . $this->description . "<br>";
        $str .= "Sector: " . $this->sector . "<br>";
        $str .= "Size: " . $this->size . "<br>";
        $str .= "Foundation Date: " . $this->foundationDate . "<br>";
        $str .= "Phone Number: " . $this->phoneNumber . "<br>";
        $str .= "Country: " . $this->country . "<br>";
        $str .= "State: " . $this->state . "<br>";
        $str .= "Address: " . $this->address . "<br>";

        return $str;
    }
    public function SetHasLogo()
    {
        $this->hasLogo = true;
    }
    /**
     * }
     */
}