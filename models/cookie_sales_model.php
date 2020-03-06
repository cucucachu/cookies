<?php

    function insert_cookies_sales($cookie_id, $sale_id) {
        global $mysqli;
        $query = "INSERT INTO `cookies_sales` (`id`, `cookie_id`, `sale_id`) VALUES (NULL, '$cookie_id', '$sale_id')";
        $result = $mysqli->query($query);

        return $mysqli->insert_id;
    }

?>