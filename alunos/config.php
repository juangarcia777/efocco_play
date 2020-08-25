<?php
//CONFIGURAÇOES
define('ROOT_DIR', dirname(__FILE__).'/' );


//CONFIGURAÇOES
require_once(ROOT_DIR."../config-geral.php");


//CLASSES DE USO
require_once(ROOT_DIR."class/class.db.php");
require_once(ROOT_DIR."class/class.seguranca.php");
require_once(ROOT_DIR."class/class.sessions.php");
require_once(ROOT_DIR."class/class.pesquisas.php");
require_once(ROOT_DIR."class/funcoes.php");
require_once(ROOT_DIR."class/class.upload.php");
require_once(ROOT_DIR."class/class.imagens.php");
require_once(ROOT_DIR."class/class_email/class.phpmailer.php");


//SETA O ALUNO LOGADO
if(isset($_SESSION['UserLogadoAVA'])){
	$id_logado = $_SESSION['UserLogadoAVA'];
}

$Pesquisa = new PESQUISAS();



?>