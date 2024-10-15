<?php

    $host = "localhost";
    $user = "root";
    $db = "bean_medical_center";
    $pass = "code";
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        echo "Failed to connect to DB". $conn->connect_error;
    }

?>