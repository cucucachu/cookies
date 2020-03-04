<?php
    // models
    include "models/cookies_model.php";
    include "models/sales_model.php";

    // views
    include "views/page_view.php";


    function page_controller() {
        $header_text = 'Cookies';
        $cookies = get_cookies_from_database();
        $sales = get_sales_from_database();
        
        page_view($header_text, $cookies, $sales);
    }
?>