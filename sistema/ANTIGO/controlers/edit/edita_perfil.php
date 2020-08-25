<?php
	function clearId($id){
	     $LetraProibi = Array(" ",",","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%", '–');
	     $special = Array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
	        'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„','–');
	     $clearspc = Array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
	        'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','', '');
	     $newId = str_replace($special, $clearspc, $id);
	     $newId = str_replace($LetraProibi, "", trim($newId));

	      $find[] = 'â€œ';  // left side double smart quote
		  $find[] = 'â€';  // right side double smart quote
		  $find[] = 'â€˜';  // left side single smart quote
		  $find[] = 'â€™';  // right side single smart quote
		  $find[] = 'â€¦';  // elipsis
		  $find[] = 'â€”';  // em dash
		  $find[] = 'â€“';  // en dash
		  $find[] = 'â€"';  // em dash
		  $find[] = 'â€"';  // en dash

		  $replace[] = '';
		  $replace[] = '';
		  $replace[] = "";
		  $replace[] = "";
		  $replace[] = "...";
		  $replace[] = "-";
		  $replace[] = "-";
		  $replace[] = "-";
		  $replace[] = "-";

		   $newId = str_replace($find, $replace, $newId);


	     return strtolower($newId);
	  }

require("../../config.php");
$db = new DB(); 

	// VERIFICA SE O CPF ALTERADO JÁ NÃO EXISTE
	 $grava = $db->select("SELECT * FROM users WHERE id != '$id_usuario' AND (cpf = '$cpf_aluno' OR usuario = '$usuario')");
	 $linha = $db->expand($grava);
	 $id_aula = $linha['id'];
	
	if ($db->rows($grava)) {
		# CPF OU USUÁRIO JÁ EXISTENTE
		//SESSIONS DE AVISO//
		$_SESSION['aviso-edicao-perfil'] = 2;
	}

	else {

			$grava = $db->select("UPDATE users SET nome='$nome_aluno', email_aluno='$email_aluno', celular_aluno='$celular_aluno', telefone_aluno='$telefone_aluno', telefone_trab_aluno='$telefone_trab_aluno', cpf='$cpf_aluno', rg='$rg_aluno', cep='$cep', municipio_nascimento='$municipio_nascimento', logradouro='$logradouro', bairro='$bairro', municipio='$municipio', estado='$estado', senha='$senha', usuario='$usuario' WHERE id='$id_usuario' LIMIT 1");

			//SESSIONS DE AVISO//
			

		 	// Count total files
		 	$countfiles = count($_FILES['file']['name']);
		 

		 	$LetraProibi = Array(" ",",","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%",'–');

		 	// VERIFICA SE EXISTEM ARQUIVOS
		 	if ($countfiles>0 && ($_FILES['file']['name'] != '')) {
		 		// Looping all files
				 for($i=0;$i<$countfiles;$i++){

				   $filename_original = $_FILES['file']['name'];
				   $rand = rand(00000,99999).time();
				   $filename = str_replace($LetraProibi, "", $filename_original);

				   $str_nome_arquivo = clearId($rand.$filename);

				   //echo $str_nome_arquivo;
				 
				  	// Upload file
				  	move_uploaded_file($_FILES['file']['tmp_name'],'../../arquivos/fotos/'.$str_nome_arquivo);

				  	// INSERÇÃO DOS ARQUIVOS CASO HAJA
				  	$grava = $db->select("UPDATE users SET img_user='$str_nome_arquivo' WHERE id='$id_usuario' LIMIT 1");
				 
				 }
		 	}

		 	$_SESSION['aviso-edicao-perfil'] = 1;

	}

	header("Location: ".ADMIN_DIR."editar_perfil/".$id_usuario."");

?>