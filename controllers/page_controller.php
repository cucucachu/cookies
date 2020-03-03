<?php
    // models
    include "models/Cookie.php";

    // views
    include "views/page_view.php";


    function page_controller() {
        $header_text = 'Cookies';
        $cookies = Cookie::get_cookies();
        
        page_view($header_text, $cookies);
    }
?>