
<?php
		include("../../class/class.db.php");
		$db = new DB(); 

		//limpo a tabela atual
	    $grava = $db->select("TRUNCATE TABLE aux_csv_cursos");

		// salvo o arquivo no servidor
	   if ( isset($_FILES["file"])) {

	            //if there was an error uploading the file
	        if ($_FILES["file"]["error"] > 0) {

	            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	            $_SESSION['retorna_csv_turmas'] = 1;
	            header("Location: ../../csv_turma");

	        }
	        else {
	                 //Print file details
	             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	             echo "Type: " . $_FILES["file"]["type"] . "<br />";
	             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";


	             	// verifica se é um arquivo csv
	                $allowed = '.csv';
					$filename = $_FILES["file"]["name"];

					$pos = strpos($filename, $allowed);
					// não é um arquivo csv, pois na extensão não há .csv
					if ($pos === false) {
						
					    $_SESSION['retorna_csv_turmas'] = 3;

						echo $_SESSION['retorna_csv_turmas'];
			             // volta para a página do administrador
							header("Location: ../../csv_turma");
					}

	                 //if file already exists
	             if (file_exists("upload/" . $_FILES["file"]["name"])) {
	            echo $_FILES["file"]["name"] . " already exists. ";
	             }
	             else {
	                    //Store file in directory "upload" with the name of "uploaded_file.txt"
	            $storagename = "uploaded_file_turmas.txt";
	            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
	            echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
	            }
	        }
	} else {	

				// nenhum arquivo encontrado
	             echo "No file selected <br />";
	             $_SESSION['retorna_csv_turmas'] = 1;

	             // volta para a página do administrador
				header("Location: ../../csv_turma");
	}



	// não existe nenhum erro, ler o arquivo e salvar no banco
	if (!isset($_SESSION['retorna_csv_turmas'])) {

		// leio o csv no mysql, tabela auxiliar
		if ( isset($storagename) && $file = fopen( "upload/" . $storagename , "r" ) ) {

		    echo "File opened.<br />";

		    $firstline = fgets ($file, 4096 );
		        //Gets the number of fields, in CSV-files the names of the fields are mostly given in the first line
		    $num = strlen($firstline) - strlen(str_replace(";", "", $firstline));

		        //save the different fields of the firstline in an array called fields
		    $fields = array();
		    $fields = explode( ";", $firstline, ($num+1) );

		    $line = array();
		    $i = 0;

		        //CSV: one line is one record and the cells/fields are seperated by ";"
		        //so $dsatz is an two dimensional array saving the records like this: $dsatz[number of record][number of cell]
		    while ( $line[$i] = fgets ($file, 4096) ) {

		        $dsatz[$i] = array();
		        $dsatz[$i] = explode( ";", $line[$i], ($num+1) );

		        $i++;
		    }

		        echo "<table>";
		        echo "<tr>";
		    for ( $k = 0; $k != ($num+1); $k++ ) {
		        echo "<td>" . $fields[$k] . "</td>";
		    }
		        echo "</tr>";

		    foreach ($dsatz as $key => $number) {
		                //new table row for every record

		    		//crio uma nova linha na tabela
		    		$grava = $db->select("INSERT INTO aux_csv_cursos (turma) VALUES (1)");

		    		//seleciono o ultimo id cadastrado
		    		$grava = $db->select("SELECT * FROM aux_csv_cursos ORDER BY id DESC LIMIT 1");
		    		$linha = $db->expand($grava);
		    		$id_altera = $linha['id'];


		        echo "<tr>";
		        $tab_campo = 1;
		        foreach ($number as $k => $content) {


		        	// retiro as aspas duplas e simples para não dar erro de insert no banco
		        	$content = str_replace( '"',"", $content);
		        	$content = str_replace( "'","", $content);

		        	// insere em cada campo da linha no banco
		        	switch ($tab_campo) {
		        		
		        		case 1:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET turma='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 2:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET unidade='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 3:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET periodo='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 4:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET curso='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 5:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET situacao='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 6:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET disciplina='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 7:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET professor='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 8:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET turno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 9:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET horario='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 10:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET email_aluno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 11:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET telefone_aluno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 12:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET celular_aluno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 13:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET telefone_prof_aluno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 14:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET nome_aluno='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;
		        		case 15:
		        			$grava = $db->select("UPDATE aux_csv_cursos SET id_aluno_sist='$content' WHERE id='$id_altera' LIMIT 1");
		        			break;

		        	}
		        		
		            //new table cell for every field of the record
		            echo "<td>" . $content ."</td>";
		            $tab_campo=$tab_campo+1;
		        }
		    }

		    echo "</table>";

		    // carrega as informações em suas respectivas tabelas.

			include("atualiza_tabelas/insere_aluno.php");
			include("atualiza_tabelas/insere_turma.php");

			// tabela de ligação de quais alunos estão em quais turmas e qual o status
			include("atualiza_tabelas/insere_turma_alunos.php");

			// carrega as informações em suas respectivas tabelas.

			include("atualiza_tabelas/insere_cursos.php");
			include("atualiza_tabelas/insere_professor.php");
			include("atualiza_tabelas/insere_disciplinas.php");

			// tabela de ligação de quais disciplinas estão em quais cursos
			include("atualiza_tabelas/insere_disciplinas_curso.php");

			// tabela de ligação de quais disciplinas estão em quais turmas
			include("atualiza_tabelas/insere_disciplinas_turma.php");

			// tabela de ligação de quais turmas estão em quais cursos
			include("atualiza_tabelas/insere_turma_curso.php");

			$_SESSION['retorna_csv_turmas'] = 2;
						 
			// volta para a página do administrador
			header("Location: ../../csv_turma");

		}

	}

	// volta para a página do administrador
	header("Location: ../../csv_turma");


?>