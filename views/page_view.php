<?php

    // Include Sub Views
    include "head_view.php";
    include "header_view.php";
    include "cookies_table_view.php";
    include "cart_view.php";
    include "sales_view.php";

    function page_view($header_text, $cookies, $sales) {
        ?>
        <html>
            <?php
                head_view();
            ?>
            <body>
                <div class="container">
                    <?php
                        header_view($header_text);
                    ?>
                    <div id="error" class="alert alert-danger" role="alert" hidden="true"></div>
                    <div class="row">
                        <div class="col-6">
                            <?php cookies_table_view($cookies); ?>
                        </div>
                        <div class="col-6">
                            <?php cart_view(); ?>
                        </div>
                    </div>

                    <?php sales_view($sales); ?>
                </div>
                
                <script src="javascript/routes.js"></script>
                <script src="javascript/cart.js"></script>
                <script src="javascript/render.js"></script>
                <script src="javascript/listeners.js"></script>
            </body>
        </html>
<?php
    }
?>