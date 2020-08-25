<?php

	
	function NotaQuestionario($id_questionario, $id_aluno){

		$total_perguntas=0;
		$acertos=0;
		$db = new DB();
		$sel = $db->select("SELECT perguntas.*, resp_quest_aluno.resp_aluno FROM perguntas
			INNER JOIN resp_quest_aluno ON perguntas.id=resp_quest_aluno.id_pergunta
			WHERE resp_quest_aluno.id_quest = '$id_questionario' AND id_aluno='$id_aluno'
			");

			while($line = $db->expand($sel)){
				
				$total_perguntas++;
				
				if(strtolower($line['resp_aluno'])==strtolower($line['resp_correta'])){					
					$acertos++;
				} 
				
			}

			//NOTA
			$nota = (10/$total_perguntas);
			$nota = round(($nota*$acertos),1);
			
			return $nota;		
	
	}


function StatusAluno($status){
	switch (strtolower($status)) {		

		case 'transferido':
			$status_label = '<span class="label label-warning capitalize-font inline-block ml-10" style="font-size: 12px;">'.$status.'</span>';
		break;

		case 'trancado':
			$status_label = '<span class="label label-warning capitalize-font inline-block ml-10" style="font-size: 12px;">'.$status.'</span>';
		break;

		case 'cancelado':
			$status_label = '<span class="label label-danger capitalize-font inline-block ml-10" style="font-size: 12px; ">'.$status.'</span>';
		break;

		case 'ativo':
			$status_label = '<span class="label label-success capitalize-font inline-block ml-10" style="font-size: 12px;">'.$status.'</span>';
		break;

		case 'evadido':
			$status_label = '<span class="label label-danger capitalize-font inline-block ml-10" style="font-size: 12px; ">'.$status.'</span>';
		break;
																
	}

	return $status_label;

}

	function ContQuerySql($query)
	{

		$sel = $db->select($query);

		return $db->rows($sel);
	}


	function formata_data_hora($data_hora){

		$data = substr($data_hora, 0,10);
		$hora = substr($data_hora, 11,5);

		$data = data_mysql_para_user($data);

		return $data.' às '.$hora.'hs';

	}


	function video_aula($video,$tipo){

		if(empty($video)){
			return '';
		}

		if($tipo==1){

				$ex = explode('?v=',$video);
				$video = '<div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$ex[1].'" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>';

		} 

		else if($tipo==2){

				$ex = explode('vimeo.com/',$video);
				$video = '<div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$ex[1].'" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>';

		} 

		return $video;

	}




?>