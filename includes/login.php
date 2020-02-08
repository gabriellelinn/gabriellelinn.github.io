<?php
    include 'dbconfig.php';
    
     $loginUsername = $loginPassword = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $loginUsername = test_input($_POST['l_username']);
        $loginPassword = test_input($_POST['l_password']);
    }

    function test_input($data){
        $data =trim($data);
        $data = stripslahes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $loginhashed = hash('sha512', $loginPassword);//char128 length field

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? && password = ?");  /*capital letters are mysql comands and users is the database table 
    has to be in same order of table(look at structure)*/
    $stmt->bind_param("ss", $loginUsername, $loginhashed); /*they bind the query any place there is a question, tells what type of data is going in. So 3 strings of data are the username password and email. */
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $_SESSION['currentuser']=$loginUsername;
        echo 'ok';
    }
    else{
        $error="<div class='alert alert-danger'>Username and/or Password are incorrect - Try Again!</div>";
    }






    $stmt->close(); /*close the bind */
    $conn->close(); /*close connection*/



    ?>