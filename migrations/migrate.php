<?php
    include "migrations/drop_tables.php";
    include "migrations/initial_tables.php";

    drop_tables();
    initial_tables();
?>