<?php
//CONFIGURAÇOES
define('ROOT_DIR', dirname(__FILE__).'/' );


//CONFIGURAÇOES
require_once(ROOT_DIR."../config-geral.php");
if(AVA_AMBINETE_CONFIGURADO==0){
	echo '<center><br><br><h2>AS VÁRIAVEIS DE AMBIENTE DEVEM SER CONFIGURADAS.</h2></center>';
	exit();
}


//CLASSES DE USO
require_once(ROOT_DIR."class/class.db.php");
require_once(ROOT_DIR."class/class.seguranca.php");
require_once(ROOT_DIR."class/class.sessions.php");
require_once(ROOT_DIR."class/class.pesquisas.php");
require_once(ROOT_DIR."class/funcoes.php");


//SETA O ALUNO LOGADO
//SETA O ALUNO LOGADO
if(isset($_SESSION['UserLogadoAVA'])){
	$id_logado = $_SESSION['UserLogadoAVA'];
}

$Pesquisa = new PESQUISAS();



?>