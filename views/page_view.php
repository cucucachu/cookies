<?php
    include "head_view.php";
    include "Header_View.php";
    include "cookies_table_view.php";

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

                    cookies_table_view($cookies);
                ?>

            <script src="javascript/cookies.js"></script>
            </body>
        </html>
<?php
    }
?>