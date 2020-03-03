
<?php 
    function cart_view() {
?>
    <div id="cart" hidden="true">
        <h5>Your Cart</h5>
        <table class="table table-bordered" id="cart_table">
            <thead>
                <tr>
                    <th scope="col">Cookie</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="cart_body">
            </tbody>
        </table>

        <p id="total" class="text-align-right"></p>
    </div>
<?php 
    }
?>