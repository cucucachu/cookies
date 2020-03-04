<?php
    // Models
    include "models/connection.php";
    include "models/cookies_model.php";
    include "models/sales_model.php";

    // Views
    include "views/page_view.php";
    $mysqli = connect();

    function page_controller() {

        // Call Models for Data
        $header_text = 'Cookie Store';
        $cookies = get_cookies_from_database();
        $sales = get_sales_from_database();
        
        // Call View to Render
        page_view($header_text, $cookies, $sales);
    }
?>