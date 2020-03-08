<?php

    class Unit_Test {
        private $title;
        private $func;
        private $before;
        private $after;

        function __construct(string $title, string $func, string $before = null, string $after = null) {
            $this->title = $title;
            $this->func = $func;
            $this->before = $before;
            $this->after = $after;
        }

        function run($offset = 0) {
            $passed = false;

            if ($this->before !== null) {
                ($this->before)();
            }

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

            if ($this->after !== null) {
                ($this->after)();
            }

            return $passed;
        }

    }

    class Test_Group {
        private string $title;
        private $unit_tests;
        private $test_groups;
        private $before;
        private $after;

        function __construct(string $title, $unit_tests = array(), 
            $test_groups = array(), string $before = null, string $after = null) {
            $this->title = $title;
            $this->unit_tests = $unit_tests === null ? array() : $unit_tests;
            $this->test_groups = $test_groups === null ? array() : $test_groups;
            $this->before = $before;
            $this->after = $after;
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

            if ($this->before !== null) {
                ($this->before)();
            }

            foreach ($this->unit_tests as $unit_test) {
                $result = $unit_test->run($offset + 1);
                if ($result == true) {
                    $passed++;
                }
            }

            foreach ($this->test_groups as $test_group) {
                $passed += $test_group->run($offset + 1);
            }

            if ($this->after !== null) {
                ($this->after)();
            }

            if ($offset == 0) {
                echo "\n";
                echo_white("Total Tests: " . $total);
                echo_green("Tests Passed: " . $passed);

                if ($total !== $passed) {
                    echo_red("Tests Failed: " . ($total - $passed));
                }
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