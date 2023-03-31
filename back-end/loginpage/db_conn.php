<?php

    $sname = "localhost";
    $unmea = "root";
    $password = "";

    $db_name = "tattoo";

    $conn = mysqli_connect($sname, $unmea, $password, $db_name);

    if(!$conn) {
        echo "Connection Failed";
    }