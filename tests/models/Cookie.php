<?php
    include_once "models/connection.php";
    include_once "models/Cookie.php";

    include_once "tests/utility.php";

    // connect to database
    $mysqli = connect();

    // create tests array
    $tests = array();

    // Create an instance of unit test for each test, and add to tests array.
    // new Unit_Test parameters:
    //    1: string - name of test (this gets printed to console in the results).
    //    2: string - the name of a test function to call.
    //    3: string - optional - the name of a function to call before the test is run, used to set up data for the test.
    //    4: string - optional - the name of a function to call after the test is run, used to clean up data from the test.
    $tests[] = new Unit_Test("cookie->insert()", "insert_cookie_test", null, "after_delete_samoa");
    $tests[] = new Unit_Test("cookie->find_by_name()", "find_by_name_cookie_test", "before_insert_samoa", "after_delete_samoa");
    $tests[] = new Unit_Test("cookie->update()", "update_cookie_test", "before_insert_samoa", "after_delete_samoa");
    $tests[] = new Unit_Test("cookie->delete()", "delete_cookie_test", "before_insert_samoa");

    // Create a Test_Group of all the tests to run.
    // new Test_Group parameters:
    //    1: string - The name of the group of tests (this gets printed to the console in the results).
    //    2: array - An array containing instances of Unit_Test to run.
    //    3: string - optional - the name of a function to call before the test group is run, used to set up data for the tests.
    //    4: string - optional - the name of a function to call after the test group is run, used to clean up data from the tests.
    $tests = new Test_Group("Cookie Model Tests", $tests);


    // Call run() on the test group to run the tests.
    $tests->run();


    // Before and After functions used to set up or clean up data.
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

    // Test functions
    // Each should return false or throw an Exception if the test failed. 
    // If no Exception is thrown, and anything but false is returned, test is considered passing.


    // insert_cookie_test() - Creates an instance of cookie and inserts it into the database.
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

    // find_by_name_cookie_test() - Finds an instance of cookie from the database.
    function find_by_name_cookie_test() {
    
        $cookie = Cookie::find_by_name("Samoa");
    
        if ($cookie === null) {
            throw new Exception("cookie->find_by_id() failed to find cookie.");
        }
    }

    // update_cookie_test() - Retrieves an instance of Cookie from the database, and updates the price.
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

    // update_cookie_test() - Retrieves an instance of Cookie from the database, and deletes it.
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