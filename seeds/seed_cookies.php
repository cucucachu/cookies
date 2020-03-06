<?php
    include_once "models/Cookie.php";

    function seed_cookies() {
        $chocolate_chip = new Cookie(null, "Chocolate Chip", 4.99);
        $oatmeal = new Cookie(null, "Oatmeal", 5.99);
        $sugar = new Cookie(null, "Sugar", 4.99);
        $gingerbread = new Cookie(null, "Gingerbread", 3.99);

        $chocolate_chip->insert();
        $oatmeal->insert();
        $sugar->insert();
        $gingerbread->insert();
    }
?>