<?php
    function get_query_threads($screenHeight, $screenWidth) {
        echo gettype($screenHeight);
        echo "H: " . $screenHeight . "<br> W: " . $screenWidth . "<br>";
        $screenHeight = (int)$screenHeight;
        $screenWidth = (int) $screenWidth;
        echo "H(int): " . $screenHeight . "<br> W(int): " . $screenWidth . "<br>";

        if ($screenHeight <= 758) {
            echo "screenHeight <= 758";die();
            if ($screenWidth <= 767) {
                $query_threads = "SELECT * FROM threads LIMIT 1";
            } elseif ($screenWidth <= 1023) {
                $query_threads = "SELECT * FROM threads LIMIT 2";
            } elseif ($screenWidth <= 1279) {
                $query_threads = "SELECT * FROM threads LIMIT 3";
            } else {
                $query_threads = "SELECT * FROM threads LIMIT 4";
            }
        } elseif ($screenHeight <= 1280) {
            echo "screenHeight <= 1280";die();
            if ($screenWidth <= 767) {
                $query_threads = "SELECT * FROM threads LIMIT 2";
            } elseif ($screenWidth <= 1023) {
                $query_threads = "SELECT * FROM threads LIMIT 4";
            } elseif ($screenWidth <= 1279) {
                $query_threads = "SELECT * FROM threads LIMIT 6";
            } else {
                $query_threads = "SELECT * FROM threads LIMIT 8";
            }
        } elseif ($screenHeight <= 1800) {
            if ($screenWidth <= 767) {
                $query_threads = "SELECT * FROM threads LIMIT 3";
            } elseif ($screenWidth <= 1023) {
                $query_threads = "SELECT * FROM threads LIMIT 6";
            } elseif ($screenWidth <= 1279) {
                $query_threads = "SELECT * FROM threads LIMIT 9";
            } else {
                $query_threads = "SELECT * FROM threads LIMIT 12";
            }
        } elseif ($screenHeight <= 2313) {
            if ($screenWidth <= 767) {
                $query_threads = "SELECT * FROM threads LIMIT 4";
            } elseif ($screenWidth <= 1023) {
                $query_threads = "SELECT * FROM threads LIMIT 8";
            } elseif ($screenWidth <= 1279) {
                $query_threads = "SELECT * FROM threads LIMIT 12";
            } else {
                $query_threads = "SELECT * FROM threads LIMIT 16";
            }
        } else {
            $query_threads = "SELECT * FROM threads LIMIT 32";
        }
        return $query_threads;
    }