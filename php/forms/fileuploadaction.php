<?php

include_once '../common/filehandler.php';
$product = new FileHandler();
if ($product->uploadImage()) {
    echo "FILE SUCCESSFULLY UPLOADED";
} else {
    echo "HAT NISCHT GEKLAPT";
}
