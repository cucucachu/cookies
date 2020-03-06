<?php
    include "models/connection.php";
    include "models/Cookie.php";

    echo "Cookie Tests\n";

    $mysqli = connect();

    $cookie = new Cookie(null, "Samoa", 5.00);

    if ($cookie->insert() == false) {
        throw new Exception("cookie->insert() failed.");
    }
    else {
        echo "\tinsert() Test Passed\n";
    }

    $cookie = Cookie::find_by_name("Samoa");

    if ($cookie === null) {
        throw new Exception("cookie->find_by_id() failed to find cookie.");
    }
    else {
        echo "\tfind_by_id() Test Passed\n";
    }

    $cookie->price = 6.0;

    if ($cookie->update() === false) {
        throw new Exception('cookie->update() failed to update cookie.');
    }
    else {
        echo "\tupdate() Test 1 Passed\n";
    }

    $cookie = Cookie::find_by_name("Samoa");

    if ($cookie->price !== 6.0) {
        throw new Exception('cookie->update() failed to update cookie price.');
    }
    else {
        echo "\tupdate() Test 2 Passed\n";
    }

    if ($cookie->delete() === false) {
        throw new Exception('cookie->delete() returned false.');
    }
    else {
        echo "\tdelete() Test 1 Passed\n";
    }

    $cookie = Cookie::find_by_id($cookie->id);

    if ($cookie !== null) {
        throw new Exception('cookie->delete() did not delete the cookie.');
    }
    else {
        echo "\tdelete() Test 2 Passed\n";
    }

    echo "\tCookie: All Tests Passed\n";
?>