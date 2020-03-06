<?php
    require_once "models/connection.php";

    function drop_tables() {
        $mysqli = connect();

        $query = "DROP TABLE cookies";
        $mysqli->query($query); 

        $query = "DROP TABLE cookies_sales";
        $mysqli->query($query);

        $query = "DROP TABLE sales";
        $mysqli->query($query); 

        $query = "DROP TABLE buyers";
        $mysqli->query($query); 
    }

?>