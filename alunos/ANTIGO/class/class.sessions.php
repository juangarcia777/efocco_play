<?php
	
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

			header("Location: seleciona-curso");
		} else {			
			$_SESSION['ErrorAVA'] = 'Dados inválidos, tente novamente.';
			header("Location: acesso");
			
		}
		
	}
	




}


?>