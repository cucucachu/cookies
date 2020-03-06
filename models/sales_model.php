<?php
    function get_sales_from_database() {
        global $mysqli;
        $sales_query = "SELECT * FROM sales";
        $cookies_query = "SELECT * FROM cookies";
        $buyers_query = "SELECT * FROM buyer";
        $cookie_sales_query = "SELECT * FROM cookies_sales";
    
        $sales_result = $mysqli->query($sales_query);
        $cookies_result = $mysqli->query($cookies_query);
        $buyers_result = $mysqli->query($buyers_query);
        $cookie_sales_result = $mysqli->query($cookie_sales_query);

        $cookies = array();
        $sales = array();
        $buyers = array();
        $cookie_sales = array();

        for ($i = 0; $i < $sales_result->num_rows; $i++) {
            $sale = $sales_result->fetch_assoc();
            $sale_obj = new \stdClass();
            $sale_obj->id = $sale['id'];
            $sale_obj->buyer_id = $sale['buyer_id'];
            $sale_obj->date = $sale['date'];
            $sales[$i] = $sale_obj;
        }

        for ($i = 0; $i < $cookies_result->num_rows; $i++) {
            $cookie = $cookies_result->fetch_assoc();
            $cookie_obj = new \stdClass();
            $cookie_obj->id = $cookie['id'];
            $cookie_obj->name = $cookie['name'];
            $cookie_obj->price = $cookie['price'];
            $cookies[$i] = $cookie_obj;
        }

        for ($i = 0; $i < $buyers_result->num_rows; $i++) {
            $buyer = $buyers_result->fetch_assoc();
            $buyer_obj = new \stdClass();
            $buyer_obj->id = $buyer['id'];
            $buyer_obj->firstName = $buyer['firstName'];
            $buyer_obj->lastName = $buyer['lastName'];
            $buyers[$i] = $buyer_obj;
        }

        for ($i = 0; $i < $cookie_sales_result->num_rows; $i++) {
            $cookie_sale = $cookie_sales_result->fetch_assoc();
            $cookie_sale_obj = new \stdClass();
            $cookie_sale_obj->id = $cookie_sale['id'];
            $cookie_sale_obj->cookie_id = $cookie_sale['cookie_id'];
            $cookie_sale_obj->sale_id = $cookie_sale['sale_id'];
            $cookie_sales[$i] = $cookie_sale_obj;
        }

        $response = array();

        for ($i = 0; $i < count($sales); $i++) {
            $sale = $sales[$i];
            $cookie_counts = array();
            $sale_obj = new \stdClass();
            $sale_obj->id = $sale->id;
            $cookie_sales_for_this_sale = array();

            $total = 0.0;

            for ($ii = 0; $ii < count($cookie_sales); $ii++) {
                $cookie_sale = $cookie_sales[$ii];
                if ($cookie_sale->sale_id === $sale->id) {
                    $cookie_sales_for_this_sale[count($cookie_sales_for_this_sale)] = $cookie_sale;
                }
            }

            for ($ii = 0; $ii < count($cookie_sales_for_this_sale); $ii++) {
                $cookie_sale = $cookie_sales_for_this_sale[$ii];
                for ($iii = 0; $iii < count($cookies); $iii++) {
                    $cookie = $cookies[$iii];
                    if ($cookie_sale->cookie_id === $cookie->id) {
                        $total += (float)$cookie->price;
                        if (array_key_exists($cookie->name, $cookie_counts)) {
                            $cookie_counts[$cookie->name]++;
                        }
                        else {
                            $cookie_counts[$cookie->name] = 1;
                        }
                    }
                }
            }

            $sale_obj->total = $total;
            $sale_obj->order = $cookie_counts;

            for ($ii = 0; $ii < count($buyers); $ii++) {
                $buyer = $buyers[$ii];
                if ($buyer->id === $sale->buyer_id) {
                    $sale_obj->customer = $buyer->firstName . " " . $buyer->lastName;
                }
            }

            $sale_obj->date = $sale->date;
            
            $response[$i] = $sale_obj;
        }

        return $response;
    }

    function insert_sale($buyer_id) {
        global $mysqli;
        $query = "INSERT INTO `sale` (`id`, `buyer_id`, `date`) VALUES (NULL, '$buyer_id', CURRENT_DATE)";
        $result = $mysqli->query($query);

        return $mysqli->insert_id;
    }
?>