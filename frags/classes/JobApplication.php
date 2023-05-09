<?php

class JobApplication
{
    //continue the code , constructor , getters and setters
    public string $id;
    public string $jobOfferID;
    public string $jobSeekerEmail;
    public string $companyEmail;
    public string $status;

    public string $applicationdate;
   // make contructor but all attributes are optional with default values being empty strings
    public function __construct(
        string $jobOfferId = "",
        string $jobseekerEmail = "",
        string $companyEmail = "",
        string $status = "",
        string $applicationdate = ""
    ) {
        $this->id =$this->gen_uuid();
        $this->jobOfferId = $jobOfferId;
        $this->jobSeekerEmail = $jobseekerEmail;
        $this->companyEmail = $companyEmail;
        $this->status = $status;
        $this->applicationdate = $applicationdate;
    }
    public function getJobOffer()
    {
        return JobOfferRepository::getOneWhere("id",$this->jobOfferId);
    }
    public function getJobSeeker()
    {
        return JobSeekerRepository::getOneWhere("email",$this->jobSeekerEmail);
    }
    public function getCompany()
    {
        return CompanyRepository::getOneWhere("email",$this->companyEmail);
    }
    public function getApplicationDate()
    {
        return $this->applicationdate;
    }
    public function getApplicationStatus()
    {
        return $this->status;
    }
    public function setApplicationStatus($status)
    {
        $this->status=$status;
    }
    public function getApplicationId()
    {
        return $this->id;
    }
    public function getJobOfferId()
    {
        return $this->jobOfferId;
    }
    public function getJobSeekerEmail()
    {
        return $this->jobSeekerEmail;
    }
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }
    public function setJobOfferId($jobOfferId)
    {
        $this->jobOfferId=$jobOfferId;
    }
    public function setJobSeekerEmail($jobseekerEmail)
    {
        $this->jobSeekerEmail=$jobseekerEmail;
    }
    public function setCompanyEmail($companyEmail)
    {
        $this->companyEmail=$companyEmail;
    }
    public function setApplicationDate($applicationdate)
    {
        $this->applicationdate=$applicationdate;
    }
    public function setApplicationId($id)
    {
        $this->id=$id;
    }
    function gen_uuid() : string
    {
        $uuid = array(
            'time_low' => 0,
            'time_mid' => 0,
            'time_hi' => 0,
            'clock_seq_hi' => 0,
            'clock_seq_low' => 0,
            'node' => array()
        );

        $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
        $uuid['time_mid'] = mt_rand(0, 0xffff);
        $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
        $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
        $uuid['clock_seq_low'] = mt_rand(0, 255);

        for ($i = 0; $i < 6; $i++) {
            $uuid['node'][$i] = mt_rand(0, 255);
        }

        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%04x%02x%02x%02x%02x%02x',
            $uuid['time_low'],
            $uuid['time_mid'],
            $uuid['time_hi'],
            $uuid['clock_seq_hi'],
            $uuid['clock_seq_low'],
            $uuid['node'][0],
            $uuid['node'][1],
            $uuid['node'][2],
            $uuid['node'][3],
            $uuid['node'][4],
            $uuid['node'][5]
        );

        return $uuid;
    }
}