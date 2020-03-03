<?php

    class Header_View {
        function __construct($title) {
            $this->title = $title;
        }

        function render() {
            echo "<h1>$this->title</h1>";
        }
    }

?>