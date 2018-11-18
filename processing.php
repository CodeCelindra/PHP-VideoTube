<?php 
require_once("includes/header.php"); 
require_once("includes/classes/VideoUploadData.php"); 
require_once("includes/classes/VideoProcessor.php"); 

if(!isset($_POST["uploadButton"])){
    echo "Not file sent to page";
    exit();
}

// File Upload
$videoUploadData = new VideoUploadData(
                            $_FILES["fileInput"], 
                            $_POST["titleInput"],
                            $_POST["descriptionInput"], 
                            $_POST["privacyInput"],
                            $_POST["categorieInput"], 
                            "REPLACE-THIS"
                            );

// Verarbeite hochgeladene Video Datei
$videoProcessor = new VideoProcessor($con);
$wasSuccessful = $videoProcessor->upload($videoUploadData);

// Prüfe ob Upload erfolgreich war
?>