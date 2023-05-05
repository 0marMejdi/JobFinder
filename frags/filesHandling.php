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