<?php
    include "models/Cookie.php";
    include "models/connection.php";
    $mysqli = connect();

    function get_cookies() {
        $cookies = Cookie::get_cookies();
        echo json_encode($cookies);
    }
?>