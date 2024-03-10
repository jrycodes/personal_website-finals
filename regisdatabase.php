<?php
    $hostname = "localhost";
    $dbuser = "id21973899_choa";
    $dbPassword = "@Admin123";
    $dbname = "id21973899_choa";
    $conn = mysqli_connect($hostname, $dbuser, $dbPassword, $dbname);
    if (!$conn) {
        die("Something went wrong!");
    }
?>