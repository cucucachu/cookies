
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
        <form>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" id="first_name">
                <label>Last Name</label>
                <input class="form-control" type="text" id="last_name">
            </div>
        </form>

        <button class="btn btn-primary" id="checkout_button">Checkout</button>
    </div>
<?php 
    }
?>