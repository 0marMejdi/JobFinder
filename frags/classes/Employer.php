<?php

include_once "Person.php";

class Employer extends Person
{
    public int $companyID;
    public function __construct($name = "", $lastName = "", $email = "", $password = "", $gender = "", $number = "", $birthdate = "", $country = "", $state = "")
    {
        parent::__construct($name, $lastName, $email, $password, $gender, $number, $birthdate, $country, $state);
        $this->companyID=0;
        $this->personType = "employer";
    }

    public function __toString(): string
    {
        $str = parent::__toString();
        return $str;
    }

    /**
     * modifies attribute and database of the current object
     * @param string $attributeName
     * @param $newValue
     * @return bool if it has been modified or no
     *
     * it's false when attribute name is wrong
     */
    public function modify(string $attributeName, $newValue)
    {
        return parent::modifyAttributeAndDatabase("employers", $attributeName, $newValue);
    }
}
