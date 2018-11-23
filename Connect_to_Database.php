<?php

$link = mysqli_connect("localhost", "root", "12345", "bloodbank_database");
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

?>