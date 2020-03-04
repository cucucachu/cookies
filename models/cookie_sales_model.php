<?php

    function insert_cookie_sale($cookie_id, $sale_id) {
        global $mysqli;
        $query = "INSERT INTO `cookie_sale` (`id`, `cookie_id`, `sale_id`) VALUES (NULL, '$cookie_id', '$sale_id')";
        $result = $mysqli->query($query);

        return $mysqli->insert_id;
    }

?>