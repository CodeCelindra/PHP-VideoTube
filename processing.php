<?php 
require_once("includes/header.php"); 


if(!isset($_POST["uploadButton"])){
    echo "Not file sent to page";
    exit();
}

// 1) create file upload
$videoUploadData = new VideoUploadData(
                            $_POST["fileInput"], 
                            $_POST["titleInput"],
                            $_POST["descriptionInput"], 
                            $_POST["privacyInput"],
                            $_POST["categorieInput"], 
                            "REPLACE-THIS"
                            );

// 2) Process video data (upload)

// 3) Check if upload was successful
?>