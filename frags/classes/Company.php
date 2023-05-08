<?php
class Company {
    public string $companyName;
    public string $email;
    public string $password;
    public string $description;
    public string $sector;
    public string $subSector;
    public int $size;
    public string $foundationDate;
    public string $phone;
    public string $country;
    public string $region;
    public string $address;
    public bool $hasLogo;
    public string $userType = "Company";
    public function __construct(
        string $companyName = "",
        string $email = "",
        string $password = "",
        string $description = "",
        string $sector = "",
        string $subSector = "",
        int $size = 0,
        string $foundationDate = "",
        string $phone = "",
        string $country = "",
        string $region = "",
        string $address = "",
        bool $hasLogo = false
    ) {
        $this->companyName = $companyName;
        $this->email = $email;
        $this->password = $password;
        $this->description = $description;
        $this->sector = $sector;
        $this->subSector = $subSector;
        $this->size = $size;
        $this->foundationDate = $foundationDate;
        $this->phone = $phone;
        $this->country = $country;
        $this->region = $region;
        $this->address = $address;
        $this->hasLogo = $hasLogo;
    }
    public function __toString(): string
    {
        $str = "Company Name: " . $this->companyName . "<br>";
        $str .= "Email: " . $this->email . "<br>";
        $str .= "Description: " . $this->description . "<br>";
        $str .= "Sector: " . $this->sector . "<br>";
        $str .= "Sub Sector: " . $this->subSector . "<br>";
        $str .= "Size: " . $this->size . "<br>";
        $str .= "Foundation Date: " . $this->foundationDate . "<br>";
        $str .= "Phone: " . $this->phone . "<br>";
        $str .= "Country: " . $this->country . "<br>";
        $str .= "Region: " . $this->region . "<br>";
        $str .= "Address: " . $this->address . "<br>";
        $str .= "Has Logo: " . ($this->hasLogo)? "Yes" : "No" . "<br>";
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
        return ObjectRepository::modifyAttributeAndDatabase( "Company", $this , $attributeName, $newValue);
    }
    public function isCompany(){
        return true;
    }
    public function isJobSeeker(){
        return false;
    }



}