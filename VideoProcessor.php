<?php
class VideoProcessor {

    private $con;
    private $sizeLimit = 50000000;
    private $allowedTypes = array("mp4", "flv", "webm", "mkw", "vob", "ogv", "ogg", "avi", "wmv", "mow", "mpeg", "mpg");

    public function __construct($con) {
        $this->con = $con;
    }

    public function upload($videoUploadData) {

        $targetDir = "uploads/videos/";
        $videoData = $videoUploadData->videoDataArray;

        $tempFilePath = $targetDir . uniqid() . basename($videoData["name"]);

        // entfernt Leerzeichen im Dateinamen und ersetzt es durch _
        $tempFilePath = str_replace(" ", "_", $tempFilePath);

        $isValidData = $this->processData($videoData, $tempFilePath);
        
    }

    private function processData($videoData, $filePath) {
        $videoType = pathInfo($filePath, PATHINFO_EXTENSION);

        if(!$this->isValidSize($videoData)) {
            echo "Gewählte Datei ist zu groß. Maximale Datei Größe ist " . $this->sizeLimit . " bytes";
            return false;

        }
        else if (!$this->isValidType($videoType)) {
            echo "Dateitype ist nicht erlaubt";
            return false;
        }
    }

    private function isValidSize($data) {
        return $data["size"] <= $this->sizeLimit;
    }

    private function  isValidType($type) {
        // Konvertiert den Dateinmen in Kleinbuchstaben
        $lowercase = strtolower($type);
        return in_array($lowercase, $this->allowedTypes);
    }
}
?>