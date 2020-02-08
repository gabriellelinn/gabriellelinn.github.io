<?php

//starts the session
    session_start();

    $db_user = "gkknxlfd_fpuser";
    $host = "localhost";
    $db_password = "fpuser"; /*Might be lower case u*/
    $database = "gkknxlfd_finalprojectdb";

    $conn = mysqli_connect($host, $db_user, $db_password, $database);

    if(!$conn){
        echo "Error: Something went wrong";
        }else{
            echo "Connected to database -_-";
        }
    ?>