<?php

class JobOffer
{
    //TODO :: education and location needs to be removed
    //TODO :: experience should be prefferd years of experience
    //TODO :: need to add required speciality (sector + subsector)
    public string $id;
    public string $companyEmail;
    public string $title;
    public string $description;
    public string $publishDate;
    public string $contractType;
    public string $workTime;
    public string $workType;
    public string $location;
    public string $education;
    public string $experience;
    public float $salary;
//make constructor
    public function __construct(
        $title="",
        $description="",
        $workTime="",
        $workType="",
        $contractType="",
        $location="",
        $education="",
        $experience="",
        $salary=0.0)
    {
        $this->id = UUID::gen_uuid();
        $this->title = $title;
        $this->description = $description;
        $this->contractType = $contractType;
        $this->workTime = $workTime;
        $this->workType = $workType;
        $this->location = $location;
        $this->education = $education;
        $this->experience = $experience;
        $this->salary = $salary;
        $this->companyEmail = $_SESSION["currentUser"]->email;
        $this->publishDate = date("Y-m-d");
    }



    public function __toString(): string
    {
        //make \n between each attribute
        return "id : {$this->id}" . "<br>" . "title : {$this->title}" . "<br>" . "description : {$this->description}" . "<br>" . "publishDate : {$this->publishDate}" . "<br>" . "contractType : {$this->contractType}" . "<br>" . "workTime : {$this->workTime}" . "<br>" . "workType : {$this->workType}" . "<br>" . "location : {$this->location}" . "<br>" . "education : {$this->education}" . "<br>" . "experience : {$this->experience}" . "<br>" . "salary : {$this->salary}" . "<br>" . "companyEmail : {$this->companyEmail}" . "<br>
    ";
    }
}