<?php

    $servername = "localhost";
    $username = "u07580536";
    $password = "PwdDBIs07580536";
    $db = "std_db07580536";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
//    else {
//        echo 'Connected success';
//    }
    
?>
