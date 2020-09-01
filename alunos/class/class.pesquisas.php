<?php
class PESQUISAS{

	public function ListaDuvidas(){
		@session_start();
		$db = new DB();
		$id_logado = $_SESSION['UserLogadoAVA'];

		$sel = $db->select("SELECT * FROM duvidas_aulas WHERE id_aluno='$id_logado' ORDER BY id DESC");	
		return ($sel);

	}


	public function NotaQuestionario($correcao=0,$id_questionario){
		@session_start();
		$db = new DB();
		$nota = 0;
		$nota_cheia=0;
		$acertos = 0;
		$total_perguntas = 0;

		//$id_questionario = $_SESSION['QuestionarioSelecionadoAVA'];
		$id_logado = $_SESSION['UserLogadoAVA'];
		$perguntas_dissertativa = 0;

		$sel = $db->select("SELECT perguntas.*, resp_quest_aluno.resp_aluno, resp_quest_aluno.resp_correta_dissertativa 
			FROM perguntas
			LEFT JOIN resp_quest_aluno ON perguntas.id=resp_quest_aluno.id_pergunta
			WHERE resp_quest_aluno.id_quest = '$id_questionario' AND id_aluno='$id_logado'
			");

		if($correcao==0){

			while($line = $db->expand($sel)){
				
				

				if($line['tipo_pergunta']==2){
					
					if($line['resp_correta_dissertativa']==0){
						$perguntas_dissertativa++;
					}				

					//ACERTOU
					if($line['resp_correta_dissertativa']==1){
						$acertos++;
					}
				
				} else {
					if(strtolower($line['resp_aluno'])==strtolower($line['resp_correta'])){					
						$acertos++;
					} 
				}

				$total_perguntas++;				
				
				
			}
			
			//NOTA
			if($total_perguntas>0 && $perguntas_dissertativa==0){
				
				$nota = (10/$total_perguntas);
				$nota = round(($nota*$acertos),1);

			} else {
				
				$nota = '---';
				$acertos = 'EM BREVE';
				$total_perguntas = 'EM BREVE';

			}
			
			
			$array_retorno = array("nota_aluno"=>$nota, "nota_cheia"=>'10', "total_perguntas"=>$total_perguntas, "acertos"=>$acertos, "dissertativas"=>$perguntas_dissertativa);


			return $array_retorno;	
		
		} else {
			
			if($db->rows($sel)){
				return $sel;		
			} else {
				return '';		
			}	
		}
		
	
	}
   
	
	public function TurmasAluno(){
		@session_start();
		$db = new DB();  		
		
			$id_logado = $_SESSION['UserLogadoAVA'];
			$db = new DB();    
			$sel = $db->select("SELECT turma_alunos.id_turma, turma.data_entrada, turma.nome FROM turma_alunos 
				INNER JOIN turma ON turma_alunos.id_turma=turma.id
				WHERE turma_alunos.id_aluno= '$id_logado'
				ORDER BY turma.id DESC
				");
			if($db->rows($sel)){
				return $sel;		
			} else {
				return '';		
			}		
		
	}


	public function DadosAluno(){
		@session_start();
		$db = new DB();  		
		
			$id_logado = $_SESSION['UserLogadoAVA'];
			$db = new DB();    
			$sel = $db->select("SELECT * FROM users WHERE id= '$id_logado' LIMIT 1");
			return $db->expand($sel);	
		
	}

	public function DadosCurso(){
		@session_start();
		$db = new DB();  		
		
			$id_curso = $_SESSION['CursoSelecionadoAVA'];
			$db = new DB();    
			$sel = $db->select("SELECT * FROM turma WHERE id= '$id_curso' LIMIT 1");
			return $db->expand($sel);	
		
	}


	public function ListaDisciplinasCurso(){
			@session_start();
			$db = new DB();  		
		
			$id_curso = $_SESSION['CursoSelecionadoAVA'];
			$db = new DB();    
			$sel = $db->select("SELECT turma_disciplinas.*, disciplinas.nome FROM turma_disciplinas 
				LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
				WHERE turma_disciplinas.id_turma= '$id_curso'
				ORDER BY disciplinas.id");
			if($db->rows($sel)){
				return $sel;		
			} else {
				return '';		
			}		
	}


	public function InformacoesDisciplina($id_disciplina){
		
		$db = new DB();  		
		 
		$sel = $db->select("SELECT * FROM disciplinas WHERE id='$id_disciplina' LIMIT 1");
		return $db->expand($sel);	
		
	}



	public function DadosDisciplina($id_disciplina){
		@session_start();
		$db = new DB();  		
		
			$id_curso = $_SESSION['CursoSelecionadoAVA'];
			$db = new DB(); 
			$hoje = date("Y-m-d");   			
			
			$sel = $db->select("SELECT count(*) AS total_aulas 
				FROM aulas_alocadas 
				INNER JOIN aula ON aulas_alocadas.id_aula=aula.id
				WHERE aulas_alocadas.id_turma='$id_curso' AND aulas_alocadas.id_disciplina='$id_disciplina'
				AND (aulas_alocadas.data_liberacao='0000-00-00' OR aulas_alocadas.data_liberacao<='$hoje')
				");
			$aulas = $db->expand($sel);	

			
			$sel = $db->select("SELECT count(*) AS total_arquivos 
				FROM aulas_alocadas 
				INNER JOIN arquivos_aula ON aulas_alocadas.id_aula=arquivos_aula.id_aula
				WHERE aulas_alocadas.id_turma='$id_curso' AND aulas_alocadas.id_disciplina='$id_disciplina'");
			$arquivos = $db->expand($sel);

			$sel = $db->select("SELECT count(*) AS total_questionarios 
				FROM aulas_alocadas 
				INNER JOIN questionarios ON aulas_alocadas.id_aula=questionarios.id_aula
				WHERE aulas_alocadas.id_turma='$id_curso' AND aulas_alocadas.id_disciplina='$id_disciplina'");
			$questionarios = $db->expand($sel);
			
			$array_retorno = array("arquivos"=>$arquivos['total_arquivos'], "questionarios"=>$questionarios['total_questionarios'], "aulas"=>$aulas['total_aulas']);

			return $array_retorno;
				
		
	}


	public function DadosAula($id_aula){		
		$db = new DB();  					  			
			
			
			$sel = $db->select("SELECT count(*) AS total_videos FROM aula 
				WHERE id='$id_aula' AND video_aula!=''");
			$videos = $db->expand($sel);

			$sel = $db->select("SELECT count(*) AS total_arquivos FROM arquivos_aula 				
				WHERE id_aula='$id_aula'");
			$arquivos = $db->expand($sel);

			$sel = $db->select("SELECT count(*) AS total_questionarios FROM questionarios 
				WHERE id_aula='$id_aula'");
			$questionarios = $db->expand($sel);
			
			$array_retorno = array("videos"=>$videos['total_videos'], "arquivos"=>$arquivos['total_arquivos'], "questionarios"=>$questionarios['total_questionarios']);

			return $array_retorno;
				
		
	}


	public function InformacoesAula($id_aula){
		
		$db = new DB();  				
		$sel = $db->select("SELECT aula.*, professores.curriculo, aulas_alocadas.id_disciplina, disciplinas.professor 
			FROM aula 
			INNER JOIN aulas_alocadas ON aula.id=aulas_alocadas.id_aula
			LEFT JOIN  disciplinas ON aulas_alocadas.id_disciplina=disciplinas.id
			LEFT JOIN professores ON disciplinas.professor=professores.id
			WHERE aula.id='$id_aula' 
			GROUP BY aula.id
			LIMIT 1");
		return $db->expand($sel);	
		
	}



	public function ListaAulasDisciplina($id_disciplina){
		@session_start();
		$db = new DB();  		
		
			$id_curso = $_SESSION['CursoSelecionadoAVA'];
			$id_logado = $_SESSION['UserLogadoAVA'];
			$hoje = date("Y-m-d");
			    
			$sel = $db->select("SELECT aulas_alocadas.data_liberacao AS data_liberacao, aulas_alocadas.id AS id_alocada, aula.id, aula.titulo, aula.glossario, 
    			FIND_IN_SET('$id_logado', controle_aulas_arquivos_questionarios.aula_final) AS concluido
				FROM aulas_alocadas
				INNER JOIN aula ON aulas_alocadas.id_aula=aula.id
				LEFT JOIN controle_aulas_arquivos_questionarios ON aula.id=controle_aulas_arquivos_questionarios.id_aula
				WHERE aulas_alocadas.id_turma='$id_curso' AND aulas_alocadas.id_disciplina='$id_disciplina'
				AND (aulas_alocadas.data_liberacao='0000-00-00' OR aulas_alocadas.data_liberacao<='$hoje')
				GROUP BY aulas_alocadas.id
				ORDER BY aulas_alocadas.ordem ASC");

			if($db->rows($sel)){
				return $sel;		
			} else {
				return '';		
			}		
	}



	public function QuestionariosAula($id_aula){
		
		@session_start();
		$db = new DB();  		
		$id_logado = $_SESSION['UserLogadoAVA'];  	  		
		 
		$sel = $db->select("SELECT questionarios.id, questionarios.titulo, questionarios.data_entrega, questionarios.somente_dia,  
			FIND_IN_SET(CONCAT(questionarios.id,'-$id_logado'), controle_aulas_arquivos_questionarios.id_questionario) AS concluido 
			FROM questionarios 
			LEFT JOIN controle_aulas_arquivos_questionarios 
			ON FIND_IN_SET(CONCAT(questionarios.id,'-$id_logado'), controle_aulas_arquivos_questionarios.id_questionario)
			WHERE questionarios.id_aula='$id_aula' 
			GROUP BY questionarios.id
			ORDER BY questionarios.id DESC");
		if($db->rows($sel)){
			return $sel;		
		} else {
			return '';		
		}	
		
	}

	public function TrabalhosAula($id_aula){
		
		@session_start();
		$db = new DB();  		
		$id_logado = $_SESSION['UserLogadoAVA'];
		$hoje= date('Y-m-d'); 	  		
		 
		$sel = $db->select("SELECT A.*, B.id AS existe , B.data AS data_entregado
		FROM trabalhos AS A
		LEFT JOIN entrega_trabalhos AS B
		ON A.id = B.id_trabalho
		WHERE A.id_aula='$id_aula' AND '$hoje' <= A.limite_data");
		if($db->rows($sel)){
			return $sel;	
		} else {
			return '';		
		}	
		
	}



	public function ArquivosAula($id_aula){
		
		@session_start();
		$db = new DB();  		
		$id_logado = $_SESSION['UserLogadoAVA'];  		
		 
		$sel = $db->select("SELECT arquivos_aula.id, arquivos_aula.arquivo,
			FIND_IN_SET(CONCAT(arquivos_aula.id,'-$id_logado'), controle_aulas_arquivos_questionarios.id_arquivo) AS concluido 
			FROM arquivos_aula 
			LEFT JOIN controle_aulas_arquivos_questionarios 
			ON FIND_IN_SET(CONCAT(arquivos_aula.id,'-$id_logado'), controle_aulas_arquivos_questionarios.id_arquivo)
			WHERE arquivos_aula.id_aula='$id_aula' 
			ORDER BY arquivos_aula.id DESC");
		if($db->rows($sel)){
			return $sel;		
		} else {
			return '';		
		}	
		
	}


	public function DadosQuestionario($id){
		
		$db = new DB();  		
		$id_curso = $_SESSION['CursoSelecionadoAVA'];
		 
		$sel = $db->select("SELECT questionarios.*, aulas_alocadas.id_disciplina AS id_materia, aulas_alocadas.data_liberacao AS data_liberacao_aula 
			FROM questionarios 
			INNER JOIN aulas_alocadas ON questionarios.id_aula=aulas_alocadas.id_aula
			WHERE questionarios.id='$id' AND aulas_alocadas.id_aula=aulas_alocadas.id_aula AND aulas_alocadas.id_turma='$id_curso' LIMIT 1");
		return $db->expand($sel);	
		
	}


	public function QuestoesQuestionario($id){
		
		$db = new DB();  		
		 
		$sel = $db->select("SELECT perguntas_questi.*, perguntas.* FROM perguntas_questi 
			INNER JOIN perguntas ON perguntas_questi.id_pergunta=perguntas.id
			WHERE perguntas_questi.id_quest='$id' 
			ORDER BY perguntas.id");
		if($db->rows($sel)){
			return $sel;		
		} else {
			return '';		
		}	
		
	}


	public function ListagemArquivosDisciplina($id_disciplina){

		@session_start();
		$db = new DB();  		
		$id_curso = $_SESSION['CursoSelecionadoAVA'];
		
		$sel = $db->select("SELECT arquivos_aula.arquivo, arquivos_aula.nome, arquivos_aula.data_upload 
				FROM arquivos_aula 
				INNER JOIN aula ON arquivos_aula.id_aula=aula.id
				WHERE aula.id_turma='$id_curso' AND aula.id_disciplina='$id_disciplina'");
		if($db->rows($sel)){
			return $sel;		
		} else {
			return '';		
		}		
	}


	public function ListagemQuestionariosMateria($id_disciplina){
		@session_start();
		$db = new DB();  		
		$id_curso = $_SESSION['CursoSelecionadoAVA'];
		
		$sel = $db->select("SELECT id, titulo, data_criacao 
			FROM questionarios
			WHERE id_turma='$id_curso' AND id_disciplina='$id_disciplina'");
		
		if($db->rows($sel)){
			return $sel;		
		} else {
			return '';		
		}	
	}


	public function AlunoRespondeuQuestionario($id){
		
		@session_start();
		$db = new DB();  		
		$id_aluno = $_SESSION['UserLogadoAVA'];

		
		$sel = $db->select("SELECT data_hora 
			FROM resp_quest_aluno
			WHERE id_quest='$id' AND id_aluno='$id_aluno'
			ORDER BY id DESC
			LIMIT 1
			");
		

		if($db->rows($sel)){
			$row = $db->expand($sel);		
			return $row['data_hora'];
		} else {
			return '';		
		}
	}



}

?>