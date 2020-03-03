<?php
    // models
    include "models/connection.php";
    include "controllers/page_controller.php";
    
    $mysqli = connect();
    page_controller();
?>