<?php
	
class PESQUISAS{




	public function DadosProfessor(){
		
		$db = new DB();  		
		
		$id = $_SESSION['SistemaLogadoAVA']; 
		$sel = $db->select("SELECT * FROM professores WHERE id='$id' ORDER BY id DESC");
		$line = $db->expand($sel);

		return $line;	
		
	}

}

?>