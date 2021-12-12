<?php

// Important do not include database and session in other files
// it's included here for all files !
include './php/database/database.php';
include './php/common/session.php';


include "php/templates/header.php";
include "php/views/content.php";
include "php/templates/footer.php";
