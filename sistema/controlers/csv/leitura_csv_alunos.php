<?php require("../../config.php");
		$db = new DB(); 
		$upload = new UploadArquivoSis(); 
		unset($_SESSION['aviso-upload_users-sucesso']);
		$data_cadastro = date("Y-m-d");

		//limpo a tabela atual
	    $grava = $db->select("TRUNCATE TABLE aux_csv_alunos");


	    $arquivo = $upload->Upload('upload','file',array('xls','xlsx'));


	    if(!empty($arquivo)){
	    	
	    	require_once '../../class/SimpleXLSX.php';

		    if ( $xlsx = SimpleXLSX::parse("upload/" . $arquivo) ) {

		    	$contador=0;
		    	$contador_real=0;
				foreach ($xlsx->rows() as $fields){

					$nome = $fields[0];
					$nascimento = $fields[1];
					$municipio_nascimento = $fields[2];
					$cpf = $fields[3];
					$rg = $fields[4];
					$expedicao = $fields[5];
					$telefone = $fields[6];
					$celular = $fields[7];
					$logradouro = $fields[8];
					$numero = $fields[9];
					$bairro = $fields[10];
					$municipio = $fields[11];
					$estado = $fields[12];
					$cep = $fields[13];
					$situacao = $fields[14];
					$turma = $fields[15];


					if($contador>0 && !empty($nome) && !empty($cpf)){
						$insert = $db->select("INSERT INTO aux_csv_alunos (nome, nascimento, municipio_nascimento, cpf, rg, telefone, celular, logradouro, bairro, municipio, estado, cep, situacao, turma, data_cadastro) VALUES ('$nome', '$nascimento', '$municipio_nascimento', '$cpf', '$rg', '$telefone', '$celular', '$logradouro, $numero', '$bairro', '$municipio', '$estado', '$cep', '$situacao', '$turma', '$data_cadastro')");
						$contador_real++;
					}

					
					$contador++;
					
					
				}

				echo 0;

			} else {
				echo 2;
				$_SESSION['aviso-tipo-ava'] = 'error';
				$_SESSION['aviso-mensagem-ava'] = 'Erro ao ler o arquivo: '.SimpleXLSX::parseError();;
				header("Location: ../../csv_alunos");
				exit();
				
			}
			echo 1;	
		    
		    $_SESSION['aviso-upload_users-sucesso'] = 1;
			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = $contador_real.' registros encontrados no arquivo!';
			header("Location: ../../alunos_turmas");
			exit();

	    } else {
	    	echo 9;
	    	header("Location: ../../csv_alunos");
				exit();
	    }
?>