<?php
    include 'dbconfig.php';

    $updateUsername = $updatePassword = $updateEmail = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $updateUsername = test_input($_POST['u_username']);
        $updatePassword = test_input($_POST['u_password']);
        $updateEmail = test_input($_POST['u_email']);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $updateHashed = hash('sha512', $updatePassword);  //CHAR 128 - length field

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $updateUsername);
    $stmt->execute();

    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $stmt = $conn->prepare("UPDATE users SET password=?, email=? WHERE username=?");
        $stmt->bind_param("sss", $updateHashed, $updateEmail, $updateUsername);
        $stmt->execute();

        //$_SESSION['currentuser']=$updateUsername;
        echo 'ok';
    }else{
        echo "Username and/or Password are incorrect - Try Again!";
    }
    
    $stmt->close();
    $conn->close();

?>