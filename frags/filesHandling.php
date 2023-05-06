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