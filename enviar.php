<?php

    $email_envio='bikejuniorsfa2@gmail.com';
    $email_pass='bicicleta100';
    $site_name='';
    $site_url='';
    $host_smtp='stmp.gmail.com';
    $host_port='465';
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $telefone=$_POST['telefone'];
    $mensagem=$_POST['mensagem'];

    $body_content="De: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem: $mensagem";

    if($_POST['leaveblank']!='' or $_POST['dontchange']!='http://'){
        echo "<h2 
            style=\"
            font-size: 1em;
            margin-top: 20%;
            text-align: center;
            font-family: 'Helvetica', 'Arial', 'Sans-Serif';
            font-weight: normal;
            color: #1b1b1b;
            \"><center><span>Aconteceu algum erro!</span><p>Você pode tentar denovo ou enviar direto para ".$email_envio." !</p></center></h2>";
        echo "<html style=\"background: #fff;\"></html>";
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=".$site_url."'>";
            
    }else if(isset($_POST['nome'])){
        require ('./PHPMailer/PHPMailerAutoload.php');
        $mail=new PHPMailer;
        $mial->CharSet='UTF-8';
        $mail->isSTMP();
        $mail->Host=$host_stmp();
        $mail->STMPAuth=true;
        $mail->Username=$email_envio;
        $mail->Password=$email_pass;
        $mail->Port=$host_port;
        $mail->From=$email_envio;
        $mail->addAddress($email_envio);
        $mail->FromName='Formulário de Contato';
        $mail->AddReployTo($_POST['email'], $_POST['nome']);
        $mail->WordMap=70;
        $mail->Subject='Formulário - '.$site_name.' - '.$_POST['nome'];
        $mail->Body=$body_content;
        if(!$mail->send()) {
            echo "<h2
              style=\"
              font-size: 1.5em;
              margin-top: 20%;
              text-align: center;
              font-family: Inconsolata', 'Helvetica', 'Arial', 'sans-serif';
              font-weight: normal;
              color: #fdc64b;
              \"><center><span>Aconteceu algum erro!</span><p>Você pode tentar denovo ou enviar direto para " . $email_envio . "!</p></center><h2>";
              echo "<html style=\"background: #fff;\"></html>";
              echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
        } else {
            echo "<h2
              style=\"
              font-size: 1.5em;
              margin-top: 20%;
              text-align: center;
              font-family: 'Inconsolata', 'Helvetica', 'Arial', 'sans-serif';
              font-weight: normal;
              color: #89bb50;
              \"><center><span>Formulário Enviado</span><p>Em breve eu entro em contato com você. Abraços.</p></center><h2>";
              echo "<html style=\"background: #fff;\"></html>";
              echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=" . $site_url . "'>";
        }

    }
?>