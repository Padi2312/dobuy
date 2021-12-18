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

    /**
     * Uploads a file picked by user to product_images folder
     * Returns null if upload failed otherwise returns the path to image
     */
    function uploadImage(): string|null
    {
        $target_file = $this->productImagePath . time() . "_" . basename($_FILES["fileToUpload"]["name"]);
        if (!$this->checkIfFileIsImage($target_file)) {
            return null;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return null;
            }
        }
    }

    /**
     * Checks if the given filename is an image
     * returns true if an image otherwise false
     */
    private function checkIfFileIsImage($file)
    {
        $ext = $this->getExtension($file);
        return $ext === "jpg" || $ext === "png" || $ext === "jpeg";
    }

    /**
     * Returns the extension from a given filename
     */
    private function getExtension($file): string
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }
}
