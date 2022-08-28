<?php
if (isset($_POST['enviar'])){
    if(!empty($_POST['email'])){
        $email=$_POST["email"];
        $header ="From: noreply@example.com" . "\r\n";
        $header.= "Reply-To: noreply@example.com" . "\r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $mail = @mail($email,$header);
        if($mail){
            echo "<h4> Mail enviado exitosamente! </h4>";
        }
    }
}
?>
