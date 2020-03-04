<?php
    function sale_as_row_view($sale) {
        echo "<tr>";
        echo "<td>$sale->id</td>";
        echo "<td><ul>";
        foreach ($sale->order as $cookie_name => $cookie_count) {
             echo "<li>$cookie_name x$cookie_count</li>";
        }
        echo "</ul></td>";
        echo "<td>$$sale->total</td>";
        echo "<td>$sale->customer</td>";
        echo "<td>$sale->date</td>";
        echo "</tr>";
    }
?>