<?php


@session_start();
@session_cache_expire(1800000); 
date_default_timezone_set('America/Sao_Paulo');

$dominio= 'efocco'; //$_SERVER['HTTP_HOST'];

if ($dominio == 'efocco') {

	define("COLOR", "efocco_color.css");

	define("TITLE", "EfoccoPlay");

	define("BACKGROUND", "background.efocco.jpg");
	define("LOGO_LOGIN", "logo.efocco.png");
	define("LOGO", "efocco-branca.png");
	
	$CAMINHO_ALUNO = 'efocco_play/alunos';	 // Quando subir para web manter so /alunos			
	$CAMINHO_SISTEMA = 'efocco_play/sistema';	 // Quando subir para web manter so /sistema
	
	// PACK DE EMAIL
	define("PLATAFORMA","EFOCCOPLAY");
	//---------------//
	
	///BANCO DE DADOS///	
	define("HOST", "localhost");
	define("DBNAME", "efoccopl_banco");
	define("USER", "root");
	define("PASSWORD", "");

	}
	
	if ($dominio == 'efac') {
		
		define("COLOR", "efac_color.css");

		define("TITLE", "Efac Online");
	
		define("BACKGROUND", "background.efac.jpg");
		define("LOGO_LOGIN", "logo.efac.svg");
		define("LOGO", "logo.efac.svg");
	
		
		$CAMINHO_ALUNO = 'sisplay/efocco_play/alunos';	 // Quando subir para web manter so /alunos
		$CAMINHO_SISTEMA = 'sisplay/efocco_play/sistema';	 // Quando subir para web manter so /sistema
		
		
		// PACK DE EMAIL
		define("PLATAFORMA","EFAC ONLINE");
		//---------------//


		///BANCO DE DADOS///	
		// define("HOST", "localhost");
		// define("DBNAME", "efac_banco");
		// define("USER", "root");
		// define("PASSWORD", "");

		define("HOST", "localhost");
		define("DBNAME", "efoccopl_banco");
		define("USER", "root");
		define("PASSWORD", "");
	
		}
	
	
	/* ################################ */
	
	if ($dominio == 'unimpg') {
	
		define("COLOR", "unimpg_color.css");
		define("TITLE", "Unimpg Online");
		
	
		define("BACKGROUND", "background.unimpg.png");
		define("LOGO_LOGIN", "logo.unimpg.png");
		define("LOGO", "logo.unimpg.png");
		
		$CAMINHO_ALUNO = 'sisplay/efocco_play/alunos';
		$CAMINHO_SISTEMA = 'sisplay/efocco_play/sistema';	 // Quando subir para web manter so /sistema
		
		// PACK DE EMAIL
		define("PLATAFORMA","UNIMPG");
		//---------------//
		
		///BANCO DE DADOS///	
		// define("HOST", "localhost");
		// define("DBNAME", "sisplay_ava");
		// define("USER", "root");
		// define("PASSWORD", "");

		define("HOST", "localhost");
		define("DBNAME", "efoccopl_banco");
		define("USER", "root");
		define("PASSWORD", "");
			
		}




//TIPO DE VIDEO USADO
define("TIPO_VIDEO_AVA", 'YOUTUBE');


//VARIAVEIS DE CAMINHO DO SITE NAO MEXER
@define("SISTEMA_AVA", 'http://'.$_SERVER['HTTP_HOST'].'/'.$CAMINHO_SISTEMA.'/');
@define("SITE_AVA", 'http://'.$_SERVER['HTTP_HOST'].'/'.$CAMINHO_ALUNO.'/');
@define("RAIZ_AVA", 'http://'.$_SERVER['HTTP_HOST'].'/'.$CAMINHO.'/');
@define("PASTA_ARQUIVOS_AULAS", $_SERVER['DOCUMENT_ROOT'].'/'.$CAMINHO.'arquivos/aulas/');
@define("LINK_ARQUIVOS_AULAS", 'http://'.$_SERVER['HTTP_HOST'].'/'.$CAMINHO.'arquivos/aulas/');


define("AVA_AMBINETE_CONFIGURADO", '1');



?>