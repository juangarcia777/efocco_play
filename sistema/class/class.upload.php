<?php

class UploadArquivoSis{
    
    //DEIXAR VAZIO PARA ACEITAR TODOS OS ARQUIVOS
	//private $extensoes = array('xls','xlsx');

	//TAMANHO EM MEGAS - MINIMO DE 1 - DEIXAR ZERO PARA ACEITAR TODOS OS TAMANHOS
	private $tamanho_maximo = 0;


    public function Upload($caminho='',$nome_campo='', $extensoes = ''){
		
    	$arquivo_upload = $_FILES["$nome_campo"]["name"];
    	$tamanho_arquivo_upload = $_FILES["$nome_campo"]["size"];
    	$temp_arquivo_upload = $_FILES["$nome_campo"]["tmp_name"];
    	$type_arquivo_upload = $_FILES["$nome_campo"]["type"];


		//RECEBE ARQUIVO//
    	if(!empty($arquivo_upload)){

    		//ACERTA O NOME DO ARQUIVO REMOVENDO ESPAÇOS E ACENTOS E COLOCA UM UNIQID ANTES DO NOME
    		$novo_nome_arquivo = $this->RenomeiaArquivo($arquivo_upload);	
    		

    		//CASO HAJA RESTRICAO DE TIPOS DE ARQUIVOS PARA UPLOAD
    		if(!empty($extensoes)){
    			
    			$permissao = $this->RestricaoArquivo($novo_nome_arquivo,$extensoes);	

    			if($permissao==0){
    				$_SESSION['aviso-tipo-ava'] = 'error';
                    $_SESSION['aviso-mensagem-ava'] ='Erro, no tipo de arquivo';
    				return '';
    			} 
    		
    		}
    		////////////////////////////////////////////////////////


    		//CASO HAJA RESTRICAO DE TAMANHO
    		if($this->tamanho_maximo!=0){
    			
    			$tamanho = $this->TamanhoArquivo($tamanho_arquivo_upload);	

    			if($tamanho==0){
    				$_SESSION['aviso-tipo-ava'] = 'error';
                    $_SESSION['aviso-mensagem-ava'] ='Erro, o arquivo é muito grande.';    				
    				return '';
    			} 
    		
    		}
    		/////////////////////////////////////////////////////////////////////////////



    		//CASO NÃO APRESENTE NENHUM ERRO - FAZ O UPLOAD E RETORNA O NOME DO ARQUIVO
    		move_uploaded_file($temp_arquivo_upload, ($caminho.'/'.$novo_nome_arquivo));
    		return $novo_nome_arquivo;


    	}

		
	}
	

	public function RenomeiaArquivo($var){		
		$str = preg_replace('/[^a-z0-9.]/i', '', $var);
		$str = strtolower($str);
		$str = uniqid().'_'.$str;
		return $str;
	}

	public function TamanhoArquivo($var){				
		
		$limite = ($this->tamanho_maximo*1000000);
		if($var>$limite){
			return 0;
		} else {
			return 1;
		}
		
	}


	public function RestricaoArquivo($var,$extensoes){		
		
		//PEGA A EXTENSÃO DO ARQUIVO
		$extensao_arquivo = strtolower(end(explode(".", $var)));		

		if(in_array($extensao_arquivo, $extensoes)){ 
			return 1;
		} else {
			return 0;
		}

	}	

}


?>