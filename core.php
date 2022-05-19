<?php
    use PHPMailer\PHPMailer\PHPMailer;

    
        $subject = $_POST['subject'];
        if (empty($_POST['subject'])) {
            header("location:code.html");
        }

        else {

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();


        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "nssjs331@gmail.com"; //enter you email address
        $mail->Password = 'Bassam@328'; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("nssjs331@gmail.com", $subject);
        $mail->addAddress("nssjs331@gmail.com"); //enter you email address
        $mail->Subject = ("nssjs331@gmail.coml ($subject)");
        $mail->Body = $subject;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
            header("location:rev.html");
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));

        
    }

    
?>
