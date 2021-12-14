<?php

include_once './php/common/session.php';
include_once './php/database/database.php';
new Database();

include "php/templates/header.php";
include "php/views/content.php";
include "php/templates/footer.php";
