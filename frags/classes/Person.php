<?php
include_once "ObjectRepository.php";
class Person
{
    //primary and necessary attributes
    public int $id;
    public string $email, $name, $lastName, $password,$personType;
    //secondary complementary attributes that are added later
    public bool $hasPhoto;
    public string $gender, $number, $birthdate, $country, $state;


    public function __construct(string $name="", string $lastName="", string $email="", string $password="",string $gender="",string $number="",string $birthdate="",string $country="",string $state="")
    {
        $this->id =0;
        $this->name = $name;
        $this->email = $email;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->hasPhoto = false;
        $this->gender = $gender;
        $this->number = $number;
        $this->birthdate = $birthdate;
        $this->country = $country;
        $this->state = $state;
        $this->personType = "Undefined";
    }
    public function __toString(): string
    {
        $str = "ID: " . $this->id . "<br>";
        $str .= "Name: " . $this->name . " " . $this->lastName ."<br>";
        $str .= "Email: " . $this->email . "<br>";
        $str .= "Password: " . $this->password . "<br>";
        $str .= "Person Type: " . $this->personType . "<br>";
        $str .= "Has Photo: " . ($this->hasPhoto ? "Yes" : "No") ."<br>";
        $str .= "Gender: " . $this->gender ."<br>";
        $str .= "Number: " . $this->number . "<br>";
        $str .= "Birthdate: " . $this->birthdate . "<br>";
        $str .= "Country: " . $this->country . "<br>";
        $str .= "State: " . $this->state . "<br>";

        return $str;
    }

    /**
     * @param string $attributeName
     * @param $newValue
     * @return bool if attribute name has been found
     */
    public function modifyAttributeAndDatabase(string $tablename, string $attributeName, $newValue) //TODO: Should be redefined for sub-classes
    {

        if (property_exists($this, $attributeName)) {
            ObjectRepository::update($tablename,$this,$attributeName,$newValue);
            $this->{$attributeName} = $newValue;

            return true;
        } else {
            return false;
        }
    }
}
