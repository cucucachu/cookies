<?php
    // Models
    include "models/connection.php";
    include "models/sales_model.php";
    include "models/buyers_model.php";
    include "models/cookies_sales_model.php";

    // Views
    include "views/sale_rows_view.php";

    $mysqli = connect();

    function get_sales() {
        $sales = get_sales_from_database();

        echo json_encode($sales);
    }

    function get_sale_rows() {
        $sales = get_sales_from_database();

        sale_rows_view($sales);
    }

    function post_sale() {
        $json = file_get_contents('php://input');
        $request = json_decode($json);
        
        $cart = $request->cart;

        $buyer = find_buyer($request->firstName, $request->lastName);


        if ($buyer == null) {
            $buyer_id = insert_buyer($request->firstName, $request->lastName);
        }
        else {
            $buyer_id = $buyer->id;
        }


        $sale_id = insert_sale($buyer_id);

        foreach($cart as $cookie_id => $count) {
            for ($i = 0; $i < $count; $i++) {
                insert_cookies_sales($cookie_id, $sale_id);
            }
        }
        
        header('Content-Type: application/json');
        $response = new \stdClass();

        $response->message = 'successful';

        echo json_encode($response);
    }
?>