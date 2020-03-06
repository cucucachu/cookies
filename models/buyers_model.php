<?php

    function find_buyer($first_name, $last_name) {
        global $mysqli;
        $query = "SELECT * FROM buyers WHERE first_name = '$first_name' AND last_name = '$last_name'";

        $result = $mysqli->query($query);
        if ($result->num_rows == 0) {
            return null;
        }
        else {
            $buyer = $result->fetch_assoc();
            $buyer_obj = new \stdClass();
            $buyer_obj->id = $buyer['id'];
            $buyer_obj->first_name = $buyer['first_name'];
            $buyer_obj->last_name = $buyer['last_name'];
            return $buyer_obj;
        }
    }

    function insert_buyer($first_name, $last_name) {
        global $mysqli;
        $query = "INSERT INTO `buyers` (`id`, `first_name`, `last_name`) VALUES (NULL, '$first_name', '$last_name')";
        $result = $mysqli->query($query);
        var_dump($result);

        return $mysqli->insert_id;
    }

?>