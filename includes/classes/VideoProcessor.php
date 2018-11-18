<?php
class VideoProcessor {

    private $con;
    private $sizeLimit = 500000000;

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

        echo $tempFilePath;
        
    }

    private function processData($videoData, $filePath) {
        $videoType = pathInfo($filePath, PATHINFO_EXTENSION);

        if(!$this->isValidSize($videoData)) {
            echo "Gewählte Datei ist zu groß. Maximale Datei Größe ist " . $this->sizelimit . " bytes";
            return false;

        }
    }

    private function isValidSize($data) {
        return $data["size"] <= $this->sizeLimit;
    }
}
?>