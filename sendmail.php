<?php 
    use PHPmailer\PHPmailer\PHPmailer;
    use PHPmailer\PHPmailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPmailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('uk','phpmailer/language/');
    $mail->IsHTML(true); 

    //від кого лист
    // $mail->setFrom('romanblajkevych@gmail.com ');
    //кому лист
    
    $mail->AddAddress('praktukaadm2023@gmail.com');
    
    $mail->Subject = 'Form';

    $body = '<h1>its the best message in the world!</h1>';

    if(trim(!empty($_post['name']))){
        $body.='<p><strong>name:</strong> '.$_POST['name'].'</p';
    }
    if(trim(!empty($_post['number']))){
        $body.='<p><strong>number:</strong> '.$_POST['number'].'</p';
    }
    if(trim(!empty($_post['E-mail']))){
        $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p';
    }
    if(trim(!empty($_post['message']))){
        $body.='<p><strong>message:</strong> '.$_POST['message'].'</p';
    }

    if (!$mail->send()){
        $message='Error';

    }else{
        $message='Well Done!';
    }
    $response = ['message'=>$message];
    header('content-type: application/json');
    echo json_encode($responce);
 ?>
