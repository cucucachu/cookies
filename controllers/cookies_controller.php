<?php

    // Models
    include "models/Cookie.php";
    include "models/connection.php";
    $mysqli = connect();

    function get_cookies() {
        $cookies = Cookie::get_cookies_from_database();
        echo json_encode($cookies);
    }
?>