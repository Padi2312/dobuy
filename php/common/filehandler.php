<?php
class FileHandler
{
    private $productImagePath = "../../assets/images/product_images/";

    function __construct()
    {
        if (!file_exists($this->productImagePath)) {
            mkdir($this->productImagePath);
        }
    }

    function uploadImage()
    {
        $target_file = $this->productImagePath . time() . "_" . basename($_FILES["fileToUpload"]["name"]);
        if (!$this->checkIfFileIsImage($target_file)) {
            return false;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function checkIfFileIsImage($file)
    {
        $ext = $this->getExtension($file);
        return $ext === "jpg" || $ext === "png" || $ext === "jpeg";
    }

    private function getExtension($file): string
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }
}
