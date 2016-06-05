<?php
$target_dir = "uploads/";												//Where to put file
$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);		//File's pathname
$uploadOk = 1;																//Bool to check if it is a zip file
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);					//Remember its file extension

//Check Password
if($_POST["password"] != "3lit3") {
	echo "Sorry, there was a problem with that password. Check the Facebook group for the most recent one."
	$uploadOk = 0;
}

// Put Upper Limit on File Size
if ($_FILES["uploadedFile"]["size"] > 25000000) {
    echo "Sorry, your file is too large. Try sharing the file with the webmaster through Google Drive instead.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "zip" ) {
    echo "Sorry, only zip files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uploadedFile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?> 