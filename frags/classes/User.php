<?php
include_once "Person.php";
class User extends Person{
    public bool $hasResume;
    public string $idealJob;
    public function __construct($name = "",  $lastName = "", $email = "", $password = "", $gender = "", $number = "", $birthdate = "", $country = "", $state = "", $hasResume = false, $idealJob = "") {
        parent::__construct( $name, $lastName, $email, $password, $gender, $number, $birthdate, $country, $state);
        $this->hasResume = $hasResume;
        $this->idealJob = $idealJob;
        $this->personType="user";
    }
    public function __toString(): string
    {
        $str= parent::__toString();
        $str .= "Has Resume: " .  ($this->hasResume ? "Yes" : "No") . "<br>";
        $str .= "Ideal Job: " . $this->idealJob . "<br>";
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
    public function modify(string $attributeName, $newValue){
        return parent::modifyAttributeAndDatabase( "Users",  $attributeName, $newValue);
    }
}

