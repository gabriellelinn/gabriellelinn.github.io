<?php
    include 'dbconfig.php';

    $registerUsername = $registerPassword = $registerEmail = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $registerUsername = test_input($_POST['r_username']);
        $registerPassword = test_input($_POST['r_password']);
        $registerEmail = test_input($_POST['r_email']);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $registerHashed = hash('sha512', $registerPassword);  //CHAR 128 - length field

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $registerUsername);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows == 0){
      
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $registerUsername, $registerHashed, $registerEmail);
        $stmt->execute();
        $_SESSION['currentuser']=$registerUsername;
        echo 'ok';
    
    }else{
        echo "Username already exists - Try Again!";
    }
    
    $stmt->close();
    $conn->close();

?>