<?php

class JobApplication
{
    //continue the code , constructor , getters and setters
    public string $id;
    public string $jobOfferID;
    public string $jobSeekerEmail;
    public string $companyEmail; // TODO :: This attribute should be deleted, to make it less coupled
    public string $status;

    public string $applicationdate;
    public string $aboutMe;
   // make contructor but all attributes are optional with default values being empty strings
    public function __construct(
        string $jobOfferId = "",
        string $jobseekerEmail = "",
        string $companyEmail = "",
        string $status = "",
        string $applicationdate = "",
        string $aboutme = ""
    ) {
        $this->id = UUID::gen_uuid();
        $this->jobOfferID = $jobOfferId;
        $this->jobSeekerEmail = $jobseekerEmail;
        $this->companyEmail = $companyEmail;
        $this->status = $status;
        $this->applicationdate = $applicationdate;
        $this->aboutMe = $aboutme;
    }

    public static function printjobapplication($application)
    {
        $joboffer=JobOfferRepository::getOneWhere("id",$application->jobOfferID);
        $company=CompanyRepository::getOneWhere("email",$joboffer->companyEmail);
        echo"
                        <div class='card'>
                         <div class='card-header'>
                             <h4>{$joboffer->title}</h4>
                             <div class='job-post-date'>Posted on: <span>{$joboffer->publishDate}</span></div>
                         </div>
                         <div class='card-body'>
                             <p>{$joboffer->description}</p>
                             <ul>
                                 <li><strong>Company:</strong> {$company->companyName}</li>
                                 <li><strong>Salary:</strong> {$joboffer->salary}</li>
                                 <li><strong>Status:</strong> {$application->status}</li>
                             </ul>
                         </div>
                         <div class='card-footer'>
                             <a href='joboffer.php?id={$joboffer->id}' class='btn btn-primary'>View Details</a>
                         </div>
                        </div>
                        <br>
                         ";
    }
    public static function printJobApplication2($application , $jobseeker ,$jobofferid): void
    {
        $add="";
        if ($jobofferid=="") {
            $joboffer=JobOfferRepository::getOneWhere("companyEmail",$application->companyEmail);
            $add = "<td class='joboffer'> <a href='joboffer.php?id={$joboffer->id}'> {$joboffer->title}.</a></td>";
        }
        echo "
                                <tr>
                                    <td>{$jobseeker->firstName} {$jobseeker->lastName}</td>
                                    <td><a href='jobseekerprofile.php?email={$jobseeker->email}'> {$jobseeker->email}</a></td>".$add."
                                    <td class='aboutus'>{$application->aboutme}.</td>
                                    <td><a href='/path/to/cv.pdf' target='_blank'>Download</a></td>
                                    <td><button type='button' class='btn btn-success'>Accept</button> <button type='button' class='btn btn-danger'>Decline</button></td>
                                </tr>
        ";
    }
}