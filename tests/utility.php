<?php

    class Unit_Test {
        private $title;
        private $func;
        private int $offset;

        function __construct(string $title, string $func) {
            $this->title = $title;
            $this->func = $func;
        }

        function run($offset = 0) {
            $passed = false;

            try {

                $result = ($this->func)();
    
                if ($result === false) {
                    echo_red("X " . $this->title, $offset);
                }
                else {
                    echo_green("\u{2713} " . $this->title, $offset);
                    $passed = true;
                }
            }
            catch (Exception $e) {
                echo_red("X " . $this->title . ": " . $e->getMessage(), $offset);
            }

            return $passed;
        }

    }

    class Test_Group {
        private string $title;
        private array $unit_tests;
        private array $test_groups;

        function __construct(string $title, array $unit_tests = array(), array $test_groups = array()) {
            $this->title = $title;
            $this->unit_tests = $unit_tests;
            $this->test_groups = $test_groups;
        }

        function get_number_of_tests() {
            $total = count($this->unit_tests);

            foreach ($this->test_groups as $test_group) {
                $total += $test_group->get_number_of_tests();
            }

            return $total;
        }

        function run($offset = 0) {
            $passed = 0;
            $total = $this->get_number_of_tests();
            echo_white($this->title, $offset);

            foreach ($this->unit_tests as $unit_test) {
                $result = $unit_test->run($offset + 1);
                if ($result == true) {
                    $passed++;
                }
            }

            foreach ($this->test_groups as $test_group) {
                $passed += $test_group->run($offset + 1);
            }

            if ($offset == 0) {
                echo_white("Total Tests: " . $total);
                echo_green("Tests Passed: " . $passed);
                echo_red("Tests Failed: " . ($total - $passed));
            }

            return $passed;
        }
    }

    function echo_white(string $text, int $offset = 0) {
        for ($i = 0; $i < $offset; $i++) {
            $text = "\t" . $text;
        }

        echo "$text\n";
    }

    function echo_red(string $text, int $offset = 0) {
        for ($i = 0; $i < $offset; $i++) {
            $text = "\t" . $text;
        }

        echo "\e[0;31m$text\e[0m\n";
    }

    function echo_green(string $text, int $offset = 0) {
        for ($i = 0; $i < $offset; $i++) {
            $text = "\t" . $text;
        }

        echo "\e[0;32m$text\e[0m\n";
    }

?>