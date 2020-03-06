<?php
    include_once "models/cookies_model.php";

    function seed_cookies() {
        insert_cookie("Chocolate Chip", 4.99);
        insert_cookie("Oatmeal", 5.99);
        insert_cookie("Sugar", 4.99);
        insert_cookie("Gingerbread", 3.99);
    }
?>