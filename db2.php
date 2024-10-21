<?php

    $HOSTNAME= "localhost";            // The host is specified
    $USERNAME = "root";             //  The username is specified
    $PASSWORD= "12345678";        // sets the password to connect to the mysql
    $DATABaSE = "db2";          // declares the db name
    

    $con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABaSE);

    if(!$con){
        die(mysqli_error($con));
    }


?>