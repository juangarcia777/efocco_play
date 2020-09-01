<?php
	
class SESSION{
   
	
	public function UserLogado(){
		@session_start();		
		$name_page = basename($_SERVER['PHP_SELF']);
		if(!isset($_SESSION['SistemaLogadoAVA'])){			
			if($name_page!='index.php'){
				header("Location: acesso");	
				exit();			
			}			
		} else {
			if($name_page=='index.php'){
				header("Location: home");	
				exit();
			} 

		}

		
	}



	public function Logout(){
		@session_start();
		unset($_SESSION['SistemaLogadoAVA']);	
		unset($_SESSION['CoordenadorSistemaLogadoAVA']);
		unset($_SESSION['GerenteLogadoAVA']);	
		unset($_SESSION['AdministradorAVA']);	
		unset($_SESSION['UnidadesAVA']);		
		header("Location: acesso");
	}


	public function Login($campos,$table,$auth){
		@session_start();
		$db = new DB();
		$query = '';
		$gerencia=0;		
		$administrador=0;		
		if(is_array($campos)){

			$count = sizeof($campos);
			$i=1;
			foreach($campos as $campo => $valor) {
			    
			    if($valor=='123.456.789-00'){
			    	$gerencia=1;
			    }

			    if($valor=='987.654.321-00'){
			    	$administrador=1;
			    }	

				$query .= $campo.'='."'".$valor."'";

				if($i<$count){
					$query .= ' AND ';	
				}
			    $i++;
			}			
		} 


		if($gerencia==1){
			$_SESSION['GerenteLogadoAVA'] = 1;	
			$_SESSION['SistemaLogadoAVA'] = 1;
			header("Location: gerencia");
			exit();
		}

		if($administrador==1){
			$_SESSION['AdministradorAVA'] = 1;	
			$_SESSION['SistemaLogadoAVA'] = 1;
			header("Location: home");
			exit();
		}		


		$sel = $db->select("SELECT $auth, turma_coordenador FROM $table WHERE $query LIMIT 1");
		if($db->rows($sel)){
			$line = $db->expand($sel);
			$_SESSION['SistemaLogadoAVA'] = $line[$auth];
			if($line['turma_coordenador']==1){
				$_SESSION['CoordenadorSistemaLogadoAVA'] = $line['turma_coordenador'];
			}
			header("Location: home");
		} else {			
			$_SESSION['ErrorAVA'] = 'Dados inválidos, tente novamente.';
			header("Location: acesso");
		}
		
	}
	




}


?>