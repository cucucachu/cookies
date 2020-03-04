<?php

    function get_cookies_from_database() {
        global $mysqli;
        $query = "SELECT * FROM cookies";

        $result = $mysqli->query($query);
        for ($i = 0; $i < $result->num_rows; $i++) {
            $cookie = $result->fetch_assoc();

            // build cookie object
            $cookie_obj = new \stdClass();
            $cookie_obj->id = $cookie['id'];
            $cookie_obj->name = $cookie['name'];
            $cookie_obj->price = $cookie['price'];

            $cookies[$i] = $cookie_obj;
        }

        return $cookies;
    }

?>