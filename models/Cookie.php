<?php

    class Cookie {

        public $id;
        public $name;
        public $price;

        function __construct($id, $name, $price) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
        }

        static function get_cookies() {
            global $mysqli;
            $query = "SELECT * FROM cookies";

            $result = $mysqli->query($query);
            for ($i = 0; $i < $result->num_rows; $i++) {
                $cookie = $result->fetch_assoc();
                $cookies[$i] = new Cookie($cookie['id'], $cookie['name'], $cookie['price']);
            }

            return $cookies;
        }
    }

?>