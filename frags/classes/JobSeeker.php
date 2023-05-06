<?php
include_once "allFrags.php";
class JobSeeker{
    //primary and necessary attributes
    public int $id=0,$experience;
    public string $email, $firstName, $lastName, $password,$userType,
        $gender, $number, $birthdate, $country, $region,
        $address, $education, $section, $subSection, $bio;
    public bool $hasPhoto;

    public function __construct(
        string $email = '',
        string $password = '',
        string $firstName = '',
        string $lastName = '',
        string $gender = '',
        string $number = '',
        string $birthdate = '',
        string $country = '',
        string $region = '',
        string $address = '',
        string $education = '',
        string $section = '',
        string $subSection = '',
        int $experience = 0,
        string $bio = '',
        bool $hasPhoto = false
    ) {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->userType = "JobSeeker";
        $this->gender = $gender;
        $this->number = $number;
        $this->birthdate = $birthdate;
        $this->country = $country;
        $this->region = $region;
        $this->address = $address;
        $this->education = $education;
        $this->section = $section;
        $this->subSection = $subSection;
        $this->experience = $experience;
        $this->bio = $bio;
        $this->hasPhoto = $hasPhoto;
    }

    public function __toString(): string
    {
        $str = "Name: " . $this->firstName . " " . $this->lastName . "<br>";
        $str .= "Email: " . $this->email . "<br>";
        $str .= "Password: " . $this->password . "<br>";
        $str .= "User Type: " . $this->userType . "<br>";
        $str .= "Gender: " . $this->gender . "<br>";
        $str .= "Number: " . $this->number . "<br>";
        $str .= "Birthdate: " . $this->birthdate . "<br>";
        $str .= "Country: " . $this->country . "<br>";
        $str .= "Region: " . $this->region . "<br>";
        $str .= "Address: " . $this->address . "<br>";
        $str .= "Education: " . $this->education . "<br>";
        $str .= "Section: " . $this->section . "<br>";
        $str .= "Subsection: " . $this->subSection . "<br>";
        $str .= "Experience: " . $this->experience . "<br>";
        $str .= "Bio: " . $this->bio . "<br>";
        $str .= "Has Photo: " . ($this->hasPhoto ? 'Yes' : 'No') . "<br>";

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
        return ObjectRepository::modifyAttributeAndDatabase( "JobSeeker", $this , $attributeName, $newValue);
    }
}

