<?php
require('../../config.php');


$db = new DB();

if(!empty($email)){
	$busca= $db->select("SELECT * FROM users WHERE email_aluno= '$email'");
	
	if($db->rows($busca)){
	$n= $db->expand($busca);

	$hash_senha= md5(time());
	$id_aluno= $n['id'];
	$get= $db->select("UPDATE users SET hash_senha='$hash_senha' WHERE id='$id_aluno' ");
	
	$to_ema = $email;

	$vaix = '<table cellspacing="0" style="font-family: Helvetica; font-size: 14px; width:600px; margin: 0 auto; border: 1px solid #D2D2D2;">
				<tr><td style="padding:14px;">
				<h2>Nova solicitação de recuperação</h2>
				<p>Olá <strong>'.$n['nome'].'</strong>, você solicitou a recuperação de senha na plataforma '.PLATAFORMA.',
				acesse o link a seguir para fazer uma nova senha:</p>
				<a href="'.SITE_AVA.'new_password/'.$hash_senha.'">Recuperar Minha Senha</a>
				<p style="font-size:12px; color:#666">IMPORTANTE: NÃO RESPONDA ESSE E-MAIL, POIS ELE É ENVIADO ATRAVÉS
				DA PLATAFORMA '.PLATAFORMA.'.</p>
				</td></tr>
			</table>';

	envia_email($to_ema, $vaix, 'juangarcia170498@gmail.com');

	echo "1";

	} else {
		echo "0";
	}
}

function envia_email($email,$mensagem,$cliente){

	$a1= utf8_decode('Recuperação de Senha '.PLATAFORMA);
	$a2= utf8_decode('PEDIDO DE RECUPERAÇÃO DE SENHA');

	$mail = new PHPMailer;
	$mail->SMTPDebug =0;
	$mail->isSMTP();
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

?>


