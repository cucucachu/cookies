<?php
    require_once "models/connection.php";

    function initial_tables() {
        $mysqli = connect();

        $create_buyers_table = "CREATE TABLE `cookies`.`buyers` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(50) NOT NULL , `last_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $create_cookies_table = "CREATE TABLE `cookies`.`cookies` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `price` DECIMAL(5,2) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $create_sales_table = "CREATE TABLE `cookies`.`sales` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `buyer_id` INT UNSIGNED NOT NULL , `date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`), FOREIGN KEY (`buyer_id`) REFERENCES `buyers`(`id`)) ENGINE = InnoDB;";
        $create_sales_cookies_table = "CREATE TABLE `cookies`.`cookies_sales` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `cookie_id` INT UNSIGNED NOT NULL , `sale_id` INT UNSIGNED NOT NULL , PRIMARY KEY (`id`), FOREIGN KEY (`cookie_id`) REFERENCES `cookies`(`id`), FOREIGN KEY (`sale_id`) REFERENCES `sales`(`id`)) ENGINE = InnoDB;";
    
        $mysqli->query($create_buyers_table);
        $mysqli->query($create_cookies_table);
        $mysqli->query($create_sales_table);
        $mysqli->query($create_sales_cookies_table);

        $mysqli->close();
    }

?>