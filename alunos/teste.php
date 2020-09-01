<?php

require('config.php');


function envia_email($email,$mensagem,$cliente){

$a1= utf8_decode('Recuperação de Senha ');
$a2= utf8_decode('PEDIDO DE RECUPERAÇÃO DE SENHA');

$mail = new PHPMailer;
$mail->SMTPDebug =0;
$mail->isSMTP();
$mail->SMTPDebug  = 1; 
$mail->Host = 'srv74.prodns.com.br';
$mail->SMTPAuth = true;
$mail->Username = 'saida@sisconnection.com.br';
$mail->Password = 'inicial2011';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail -> charSet = "UTF-8";

$mail->setFrom('saida@sisconnection.com.br', $a1);
$mail->addAddress($email);
$mail->AddCC($cliente);

$mail->isHTML(true);

$mail->Subject = $a2;
$mail->Body    = $mensagem;
$mail->send();
}

envia_email('juangarcia170498@gmail.com', 'teste', 'juangarcia170498@gmail.com');