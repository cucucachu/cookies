<?php
    include_once "models/connection.php";
    include_once "models/Cookie.php";

    include_once "tests/utility.php";

    $mysqli = connect();

    $tests = array();

    $tests[] = new Unit_Test("cookie->insert()", "insert_cookie_test", null, "after_delete_samoa");
    $tests[] = new Unit_Test("cookie->find_by_name()", "find_by_name_cookie_test", "before_insert_samoa");
    $tests[] = new Unit_Test("cookie->update()", "update_cookie_test", "before_insert_samoa", "after_delete_samoa");
    $tests[] = new Unit_Test("cookie->delete()", "delete_cookie_test", "before_insert_samoa");

    $tests = new Test_Group("Cookie Model Tests", $tests);

    $tests->run();


    // Before and After functions
    function after_delete_samoa() {
    
        $cookie = Cookie::find_by_name("Samoa");
    
        if ($cookie === null) {
            throw new Exception("cookie->find_by_id() failed to find cookie.");
        }

        $cookie->delete();
    }

    function before_insert_samoa() {
        $cookie = new Cookie(null, "Samoa", 5.00);
    
        $cookie->insert();
    }

    // Tests
    function insert_cookie_test() {
        $cookie = new Cookie(null, "Samoa", 5.00);
    
        if ($cookie->insert() == false) {
            throw new Exception("cookie->insert() failed.");
        }
    
        $cookie = Cookie::find_by_name("Samoa");
    
        if ($cookie === null) {
            throw new Exception("cookie->find_by_id() failed to find cookie.");
        }
    }

    function find_by_name_cookie_test() {
    
        $cookie = Cookie::find_by_name("Samoa");
    
        if ($cookie === null) {
            throw new Exception("cookie->find_by_id() failed to find cookie.");
        }

        $cookie->delete();
    }

    function update_cookie_test() {
    
        $cookie = Cookie::find_by_name("Samoa");

        $cookie->price = 6.0;
    
        if ($cookie->update() === false) {
            throw new Exception('cookie->update() failed to update cookie.');
        }

        $cookie = Cookie::find_by_name("Samoa");
    
        if ($cookie->price !== 6.0) {
            throw new Exception('cookie->update() failed to update cookie price.');
        }
    }

    function delete_cookie_test() {
        $cookie = Cookie::find_by_name("Samoa");

        if ($cookie->delete() === false) {
            throw new Exception('cookie->delete() returned false.');
        }

        $cookie = Cookie::find_by_id($cookie->id);
    
        if ($cookie !== null) {
            throw new Exception('cookie->delete() did not delete the cookie.');
        }
    }
?>