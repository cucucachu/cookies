<?php

    function find_buyer($first_name, $last_name) {
        global $mysqli;
        $query = "SELECT * FROM buyer WHERE firstName = '$first_name' AND lastName = '$last_name'";

        $result = $mysqli->query($query);
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $buyer = $result->fetch_assoc();
            $buyer_obj = new \stdClass();
            $buyer_obj->id = $buyer['id'];
            $buyer_obj->first_name = $buyer['firstName'];
            $buyer_obj->last_name = $buyer['lastName'];
            return $buyer_obj;
        }
    }

    function insert_buyer($first_name, $last_name) {
        global $mysqli;
        $query = "INSERT INTO `buyer` (`id`, `firstName`, `lastName`) VALUES (NULL, '$first_name', '$last_name')";
        $result = $mysqli->query($query);
        var_dump($result);

        return $mysqli->insert_id;
    }

?>