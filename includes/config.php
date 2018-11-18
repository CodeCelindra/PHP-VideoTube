<?php
ob_start(); //Turns on output buffering

date_default_timezone_set("Europe/Berlin");

try {
    $con = new PDO("mysql:dbname=videotube;host=localhost", "root", "root");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();


}


?>