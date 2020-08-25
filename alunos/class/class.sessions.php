<?php
ob_start();	
class SESSION{
   
	
	public function UserLogado(){
		@session_start();		
		@session_cache_expire(1800000); 
		$name_page = basename($_SERVER['PHP_SELF']);
		if(!isset($_SESSION['UserLogadoAVA'])){			
			if($name_page!='index.php'){
				header("Location: acesso");	
				exit();			
			}			
		} else {
			if($name_page=='index.php'){
				header("Location: home");	
				exit();
			} else {
				$this->CursoSelecionado();		
			}

		}

		
	}


	public function CursoSelecionado(){
		@session_start();
		@session_cache_expire(1800000); 
		$name_page = basename($_SERVER['PHP_SELF']);
		if(!isset($_SESSION['CursoSelecionadoAVA'])){			
			if($name_page!='escolhe_curso.php'){
				header("Location: seleciona-curso");	
				exit();
			}			
		} 		
	}


	public function Logout(){
		@session_start();
		@session_cache_expire(1800000); 
		unset($_SESSION['UserLogadoAVA']);	
		unset($_SESSION['CursoSelecionadoAVA']);	
		unset($_SESSION['QuestionarioSelecionadoAVA']);	
		unset($_SESSION['perguntas']);
				
		header("Location: acesso");
	}


	public function Login($campos,$table,$auth){
		@session_start();
		@session_cache_expire(1800000); 
		$db = new DB();
		$query = '';				
		if(is_array($campos)){

			$count = sizeof($campos);
			$i=1;
			foreach($campos as $campo => $valor) {
			    
				$query .= $campo.'='."'".$valor."'";

				if($i<$count){
					$query .= ' AND ';	
				}
			    $i++;
			}			
		} 


		$hoje = date("Y-m-d");
		$sel = $db->select("SELECT $auth FROM $table WHERE $query LIMIT 1");
		if($db->rows($sel)){
			$line = $db->expand($sel);
			$_SESSION['UserLogadoAVA'] = $line[$auth];

			$update = $db->select("UPDATE $table SET ultima_visita='$hoje' WHERE $query LIMIT 1");

			$id_logado= $line[$auth];


			//Local para criação de sessão de duvidas
			//--------------------------------------------//
			$busca_duvidas= $db->select("SELECT COUNT(id_aluno) AS qt FROM suporte_plataforma 
										WHERE id_aluno='$id_logado' 
										AND lido=0 AND resposta != '' ");

			if($db->rows($busca_duvidas)){
			 	$n= $db->expand($busca_duvidas);
				$_SESSION['perguntas'] = $n['qt'];
			}
			// -----------------------------------//

			// Bloco de criação de conferimento se email está cadastrado
			//--------------------------------------//

			$confere_email= $db->select("SELECT email_aluno FROM users WHERE id='$id_logado'");
			$y= $db->expand($confere_email);

			if(!empty($y['email_aluno'])) {
				$_SESSION['email_existe'] =  1;
			} else {
				$_SESSION['email_existe'] =  0;
			}

			//---------------------------------------//
			
			header("Location: seleciona-curso");
		} else {			
			$_SESSION['ErrorAVA'] = 'Dados inválidos, tente novamente.';
			header("Location: acesso");
			
		}
		
	}
	




}


?>