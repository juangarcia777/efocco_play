<?php
define('ROOT_DIR', dirname(__FILE__).'/' );


//CONFIGURAÇOES
require_once(ROOT_DIR."../config-geral.php");
if(AVA_AMBINETE_CONFIGURADO==0){
	echo '<center><br><br><h2>AS VÁRIAVEIS DE AMBIENTE DEVEM SER CONFIGURADAS.</h2></center>';
	exit();
}




//CLASSES DE USO
require(ROOT_DIR."class/class.db.php");
require(ROOT_DIR."class/class.seguranca.php");
require(ROOT_DIR."class/class.login.php");
require(ROOT_DIR."class/class.upload.php");
require(ROOT_DIR."class/funcoes.php");
require(ROOT_DIR."class/class.pesquisas.php");



//SETA O PROFESSOR LOGADO
if(isset($_SESSION['SistemaLogadoAVA'])){
	$id_logado = $_SESSION['SistemaLogadoAVA'];
	$CoordenadorTurma = 0;
	$GerenteAva = 0;
	$AdministradorAVA = 0;

	if(isset($_SESSION['CoordenadorSistemaLogadoAVA'])){
		$CoordenadorTurma = $_SESSION['CoordenadorSistemaLogadoAVA'];
	}
	if(isset($_SESSION['GerenteLogadoAVA'])){
		$GerenteAva=1;
	}
	if(isset($_SESSION['AdministradorAVA'])){
		$AdministradorAVA=1;
	}


}


?>