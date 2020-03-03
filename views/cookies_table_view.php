<?php
    function cookies_table_view($cookies) {
?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cookie</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
<?php
            for ($i = 0; $i < count($cookies); $i++) {
                $cookie = $cookies[$i];
                echo "<tr>";
                echo "<td>$cookie->name</td>";
                echo "<td>$$cookie->price</td>";
                echo "<td><button class=\"btn btn-primary\" onclick=\"addCookieToCart($cookie->id)\">Add to Cart</button></td>";
                echo "</tr>";
            }
?>
        </tbody>
    </table>
<?php
    }
?>