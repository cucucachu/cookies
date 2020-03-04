<?php
    // Views
    include "views/sale_rows_view.php";

    function sales_view($sales) {
?>
        <div id="sales">
            <div class="row">
                <h4>Sales History</h4>
            </div>

            <div class="row">
                <div id="sales">
                    <table class="table table-bordered" id="sales_table">
                        <thead>
                            <tr>
                                <th scope="col">Sale Number</th>
                                <th scope="col">Order</th>
                                <th scope="col">Total</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody id="sales_body">
                        <?php
                            sale_rows_view($sales);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
    }
?>