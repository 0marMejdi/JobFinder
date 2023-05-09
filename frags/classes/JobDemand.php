<?php
class JobDemand
{
    public string $id;
    public string $jobSeekerEmail;
    public string $jobOfferId;
    public string $coverLetter;
    public string $status; //refused, accepted, pending
    public string $applicationDate;
    public function __construct( $id="", $jobSeekerEmail="", $jobOfferId="", $coverLetter="", $applicationDate=""  , $status="pending")
    {
        $this->id = $id;
        $this->applicationDate= $applicationDate;
        $this->jobSeekerEmail = $jobSeekerEmail;
        $this->jobOfferId = $jobOfferId;
        $this->coverLetter = $coverLetter;
        $this->status = $status;
    }

    public function modify($attribute, $value ){
        $this->$attribute = $value;
        JobDemandRepository::update($this,$attribute,$value);
    }

}