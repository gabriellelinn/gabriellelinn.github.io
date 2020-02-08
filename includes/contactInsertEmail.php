<?php
    include "dbconfig.php";
    
    $name = $email = $message = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        //echo "2";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();
        echo "ok";
   

        //Send email confirmation
        $to = $name;
        $subject = "We received your message!!";
        
        $message = "
        <html>
        <head>
        <title>Confirmation</title>
        </head>
        <body>
        <p>Thank you for contacting us!  One of our Customer Care professionals will respond to your email.  Be assured that we have received your email and will respond as soon as possible. </p>

        <p>Below is a copy of your email message (for your records).</p>
        <table border='1'>
        <tr>
        <th>Name</th>
        <td>$name</td>
        </tr>
        <tr>
        <th>Email</th>
        <td>$email</td>
        </tr>
        <tr>
        <th>Message</th>
        <td>$message</td>
        </tr>
        </table>
        <p>We appreciate your inquiry and look forward to assisting you.</p>
        <p>Have a great day!</p>
        </body>
        </html>
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: pctwebdev@gabriellealinn.info' . "\r\n";
        $headers .= 'Cc: pctwebdev@gabriellealinn.info' . "\r\n";
        
        mail($to,$subject,$message,$headers);
        } else {
            echo "There was a problem sending your request!";
        }
?>