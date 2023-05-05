<?php
include_once "allFrags.php";
class JobSeeker{
    //primary and necessary attributes
    public int $id;
    public string $email, $name, $lastName, $password,$personType;
    //secondary complementary attributes that are added later
    public bool $hasPhoto;
    public string $gender, $number, $birthdate, $country, $state;

    public bool $hasResume;
    public string $idealJob;
    public function __construct($name = "",  $lastName = "", $email = "", $password = "", $gender = "", $number = "", $birthdate = "", $country = "", $state = "", $hasResume = false, $idealJob = "") {
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
        $this->hasResume = $hasResume;
        $this->idealJob = $idealJob;
        $this->personType="JobSeeker";
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
        return ObjectRepository::modifyAttributeAndDatabase( "JobSeekers", $this , $attributeName, $newValue);
    }
}

