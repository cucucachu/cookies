<?php
    include_once "seeds/seed_cookies.php";
    include_once "models/connection.php";

    $mysqli = connect();
    seed_cookies();
    $mysqli->close();
?>