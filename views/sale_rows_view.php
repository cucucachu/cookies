<?php
    include "views/sale_as_row_view.php";
    
    function sale_rows_view($sales) {
        $sales_displayed = 0;
        for ($i = count($sales)- 1; $i >= 0; $i--) {
            sale_as_row_view($sales[$i]);
            $sales_displayed++;
            if ($sales_displayed >= 10) {
                break;
            }
        }
    } 

?>