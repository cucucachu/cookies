<?php

    // Models
    include "models/cookies_model.php";
    include "models/connection.php";
    $mysqli = connect();

    function get_cookies() {
        $cookies = get_cookies_from_database();
        echo json_encode($cookies);
    }
?>