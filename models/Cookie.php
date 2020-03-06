<?php

    class Cookie {

        // Cookie has 3 properties, matching the database collumns.
        public $id;
        public $name; 
        public $price;

        // Constructor is used to create instances of Cookie
        // The constructor can be called to convert rows from database into Cookie instances
        //   or to create new cookie instances for insert.
        function __construct($id, $name, $price) {
            $this->id = $id === null ? null : (int)$id;
            $this->name = $name;
            $this->price = (float)$price;
        }

        // This non-static method can be called on an instance of cookie to insert the cookie
        //   into the database.
        //   Thows an exception if the cookie has an id (indicating it is already in the database).
        function insert() {
            if ($this->id !== null) {
                throw new Exception('cookie.insert() called on existing cookie.' . (string)$this->id);
            }

            global $mysqli;
            $query = "INSERT INTO `cookies` (`id`, `name`, `price`) VALUES (NULL, '$this->name', '$this->price')";
    
            return $mysqli->query($query);
        }

        // This non-static method can be called on an instance of cookie to update the cookie in the database.
        function update() {
            if ($this->id === null) {
                throw new Exception('cookie.update() called on cookie not yet in the database.');
            }

            global $mysqli;
            $query = "UPDATE `cookies` SET `name` = '$this->name', `price` = '$this->price' WHERE `cookies`.`id` = $this->id";
    
            return $mysqli->query($query);
        }

        // Static method which gets all cookies from the database, and returns them as an array of cookie instances.
        static function get_cookies_from_database() {
            global $mysqli;
            $query = "SELECT * FROM cookies";
            $cookies = array();
    
            $result = $mysqli->query($query);

            for ($i = 0; $i < $result->num_rows; $i++) {
                $cookie_row = $result->fetch_assoc();
                $cookie = new Cookie($cookie_row['id'], $cookie_row['name'], $cookie_row['price']);
                $cookies[$i] = $cookie;
            }

            return $cookies;
        }
    }

?>