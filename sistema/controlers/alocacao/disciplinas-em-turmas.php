<?php 
	require("../../config.php");

	$db = new DB();


	if(isset($alocar)){

		if(isset($aloca_tudo)){$aloca_tudo=1;} else {$aloca_tudo=0;}


		//APENAS POE A DISCIPLINA
		if($aloca_tudo==0){
			$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$alocar')");	
			$_SESSION['aviso-mensagem-ava'] = 'Alocação realizada com sucesso! ';
		}

		//AULAS QUESTIONARIOS
		if($aloca_tudo==1){



			//AULAS
			$sel = $db->select("SELECT id FROM aula WHERE id_disciplina='$alocar' ORDER BY id");
			while($nine = $db->expand($sel)){

				$id_aulax = $nine['id'];
				$vai_aula = $db->select("INSERT INTO aula (titulo, data, apresentacao, video_aula, id_turma, id_disciplina, data_criacao, glossario, prova_apenas, tipo_video, link_aovivo, data_final_link_aovivo, data_exibicao) 
   											SELECT titulo, data, apresentacao, video_aula, id_turma, id_disciplina, data_criacao, glossario, prova_apenas, tipo_video, link_aovivo, data_final_link_aovivo, data_exibicao FROM aula WHERE id = '$id_aulax'");
				$ins = $db->last_id($vai_aula);
				$up = $db->select("UPDATE aula SET id_turma='$id_turma' WHERE id='$ins' LIMIT 1");


				//QUESTIONARIOS
				$son = $db->select("SELECT id FROM questionarios WHERE id_aula='$id_aulax'");
				while($back = $db->expand($son)){

					$id_quest = $back['id'];
					$vai_quest = $db->select("INSERT INTO questionarios (id_aula, data_criacao, data_entrega, titulo, id_turma, id_disciplina, prof_criador) 
   											SELECT id_aula, data_criacao, data_entrega, titulo, id_turma, id_disciplina, prof_criador FROM questionarios WHERE id = '$id_quest'");
					$ins_quest = $db->last_id($vai_quest);
					$up_quest = $db->select("UPDATE questionarios SET id_turma='$id_turma', id_aula='$ins' WHERE id='$ins_quest' LIMIT 1");	


						//PERGUNTAS DO QUESTIONARIO
						$meka = $db->select("SELECT id FROM perguntas_questi WHERE id_quest='$id_quest'");
						while($muj = $db->expand($meka)){

							$id_perg_quest = $muj['id'];
							$vai_quest_perg = $db->select("INSERT INTO perguntas_questi (id_quest, id_pergunta) 
   											SELECT id_quest, id_pergunta FROM perguntas_questi WHERE id = '$id_perg_quest'");
							$ins_quest_perg = $db->last_id($vai_quest_perg);
							$up_quest_perg = $db->select("UPDATE perguntas_questi SET id_quest='$ins_quest' WHERE id='$ins_quest_perg' LIMIT 1");	


						}

				}


				//ARQUIVOS DAS AULAS
				$meka2 = $db->select("SELECT id FROM arquivos_aula WHERE id_aula='$id_aulax'");
				while($muj2 = $db->expand($meka2)){

					$id_arq = $muj2['id'];
					$vai_arq = $db->select("INSERT INTO arquivos_aula (id_aula, arquivo, data_upload, nome) 
   											SELECT id_aula, arquivo, data_upload, nome FROM arquivos_aula WHERE id = '$id_arq'");
					$ins_arq = $db->last_id($vai_arq);
					$up_arq = $db->select("UPDATE arquivos_aula SET id_aula='$ins' WHERE id='$ins_arq' LIMIT 1");	
				}


				

				

			}




			$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$alocar')");
			$_SESSION['aviso-mensagem-ava'] = 'Alocação completa realizada com sucesso! ';	
			
		}





	}



	if(isset($apaga_alocacao)){
		
		$delete = $db->select("DELETE FROM turma_disciplinas WHERE id_disciplina='$id_disciplina' AND id_turma='$id_turma' LIMIT 1");
		$_SESSION['aviso-mensagem-ava'] = 'Disciplina removida da turma com sucesso! ';
	} 
	

	$_SESSION['aviso-tipo-ava'] = 'success';
	header("Location: ../../disciplinas_turmas?turma=$id_turma");


?>