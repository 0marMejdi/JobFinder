<?php
function isFileUploaded(string $filename){
    if ($_FILES[$filename]['error'] === UPLOAD_ERR_OK)  {
        return true ;
    } else {
        return false;
    }
}

/**
 * @param string $fileName
 * @param string $destinationFolder
 * @return bool true if file uploaded, otherwise false
 */
function moveFileTo(string $fileName, string $destinationFolder){
    if(isset($_FILES[$fileName])) {
        $destinationFolder = rtrim($destinationFolder, "/");

        $target_file = $destinationFolder ."/". basename($_FILES[$fileName]["name"]);

        if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
            return true;
        } else {
          return false;
        }
    }
    return false;
}

function renameFile($oldFilePath, $newFileName) {
    $fileInfo = pathinfo($oldFilePath);
    $newFilePath = $fileInfo['dirname'] . '/' . $newFileName . '.' . $fileInfo['extension'];
    if (rename($oldFilePath, $newFilePath)) {
        return $newFilePath;
    } else {
        return false;
    }
}

/**
 * it will try to find the picture with the given name and gonna associate it with it prefix and return it
 * returns empty string if no picture found
 * @param string $nameWithoutSuffix without Suffix
 * @param string $directory directory where the picture is located
 * @return string
 */
function findPictureWithSuffix($nameWithoutSuffix, $directory) {
    // List of possible suffixes for image files
    $suffixes = array(".jpg", ".jpeg", ".png", ".gif");

    // Loop over all suffixes and try to find a file with that name
    foreach ($suffixes as $suffix) {
        $filename = $nameWithoutSuffix . $suffix;
        $fullpath = $directory . "/" . $filename;
        if (file_exists($fullpath)) {
            return $fullpath; // File found
        }
    }
    // No file found
    return false;
}
function addSuffixForPic($picPathWithoutSuffix){
    $suffixes = array(".jpg", ".jpeg", ".png", ".gif");
    foreach ($suffixes as $suffix) {
        $filename = $picPathWithoutSuffix . $suffix;
        if (file_exists($filename)) {
            return $filename; // File found
        }
    }
    // No file found
    return false;
}
function getPicturePath($email){
    if (JobSeekerRepository::doesExist("email",$email)){
        return addSuffixForPic("assets/data/jobSeeker/$email/pdp")?
            addSuffixForPic("assets/data/jobSeeker/$email/pdp"):
            "assets/templates/default-profile-icon-24.jpg";

    }elseif(CompanyRepository::doesExist("email",$email)){
        return addSuffixForPic("assets/data/company/company/$email/pdp")?
            addSuffixForPic("assets/data/company/$email/pdp"):
            "assets/templates/default-company.jpg";
    }else{
        return "";
    }
}
function getPicturePathForobject($object):string{
    return getPicturePath($object->email);
}
function printPicutre($email){
    echo "<img src='".getPicturePath($email)."' alt='Profile Picture' class='profile-picture'>";
}

function printPicutreForObject($object){
    printPicutre($object->email);
}

/**
 * TODO: the id needs to be modified to accept object itself
 *
 * just after applying for a job, this function uses the $_FILES to get the uploaded resume, and send it to assets/data/JobApplies/ under a folder named as the id of the job apply
 * and then it will be able to be fetched next time when a company wants to view it
 * @param string $id
 * @return bool return true if moving uploaded resume was successful, otherwise false
 */
function movingResume(string $id){
    try{
        if (isFileUploaded("resume")){
            $dir = "assets/data/JobApplies/" . $id;
            if (!file_exists($dir)) mkdir($dir, 0777, true);
            moveFileTo("resume",$dir);
            renameFile($dir . "/" . $_FILES["resume"]["name"] ,"resume");

        }
    }catch (Exception $e) {
        return false;
    }
    return true;
}
// TODO : this needs to be redefined
function getResumePath(JobDemand $object){

}
