<?php
    require_once "models/connection.php";

    function drop_tables() {
        $mysqli = connect();

        $query = "DROP TABLE cookies_sales";
        if ($mysqli->query($query) == false) {
            throw new Exception('Could not drop table cookies_sales.');
        }; 


        $query = "DROP TABLE sales";
        if ($mysqli->query($query) == false) {
            throw new Exception('Could not drop table sales.');
        }; 


        $query = "DROP TABLE cookies";
        if ($mysqli->query($query) == false) {
            throw new Exception('Could not drop table cookies.');
        }; 

        $query = "DROP TABLE buyers";
        if ($mysqli->query($query) == false) {
            throw new Exception('Could not drop table buyers.');
        }; 


        $mysqli->close();
    }

?>