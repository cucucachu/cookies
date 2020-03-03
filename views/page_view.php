<?php
    include "head_view.php";
    include "Header_View.php";
    include "cookies_table_view.php";
    include "cart_view.php";

    function page_view($header_text, $cookies) {
        ?>
        <html>
            <?php
                head_view();
            ?>
            <body>
                <div class="container">
                    <?php
                        $header = new Header_View($header_text);
                        $header->render();
                    ?>
                    <div class="row">
                        <div class="col-6">
                            <?php cookies_table_view($cookies); ?>
                        </div>
                        <div class="col-6">
                            <?php cart_view(); ?>
                        </div>
                    </div>
                

            <script src="javascript/cookies.js"></script>
            </body>
        </html>
<?php
    }
?>