<?php


	
	function ExtensaoArquivo($file){
		//$TamanhoArquivo = 0;		
		//if(file_exists(PASTA_ARQUIVOS_AULAS.$file)){
			
			//$TamanhoArquivo = filesize(PASTA_ARQUIVOS_AULAS.$file);
			$extensao = substr($file, -4);
			$ext = substr($extensao, 0,1);

			if($ext=='.'){
				$extensao = substr($file, -3);	
			} else {
				$extensao = substr($file, -4);	
			}
			

			if($extensao=='doc' || $extensao=='docx'){$extensao = '<i class="icofont-file-word"></i>';}
			else if($extensao=='pdf'){$extensao = '<i class="icofont-file-pdf"></i>';}
			else if($extensao=='xls' || $extensao=='xlsx'  || $extensao=='csv' || $extensao=='odx'){$extensao = '<i class="icofont-file-excel"></i>';}
			else if($extensao=='jpg' || $extensao=='png' || $extensao=='gif'){$extensao = '<i class="icofont-file-jpg"></i>';}
			else if($extensao=='txt'){$extensao = '<i class="icofont-file-text"></i>';}			
			else {$extensao = '<i class="icofont-file-document"></i>';}

			//$array_retorno = array("tamanho"=>formatSizeUnits($TamanhoArquivo), "extensao"=>$extensao);
			$array_retorno = array("extensao"=>$extensao);
			
			return $array_retorno;

		//} else {
		//	return $array_retorno = array("tamanho"=>'0', "extensao"=>'');
	//	}

	}


	function Numeros($numero){
		if($numero<10 && $numero!=0){
			return '0'.$numero;
		} else {
			return $numero;
		}
	}	


	function formata_data_hora($data_hora){

		$data = substr($data_hora, 0,10);
		$hora = substr($data_hora, 11,5);

		$data = data_mysql_para_user($data);

		return $data.' às '.$hora.'hs';

	}


	function apresentacao_aula($aula,$corta=0){		

		if($corta==1){
			$aula = base64_decode($aula);
			$aula = strip_tags($aula);
			if(strlen($aula)>400){
				$aula = substr($aula, 0,400).'...';	
			}			
			
		} else {

			$aula = base64_decode($aula);
			$aula = html_entity_decode($aula);

		}

		return $aula;		

	}


	function video_aula($video,$tipo){

		if(empty($video)){
			return '';
		}

		if($tipo==1){

				$ex = explode('?v=',$video);
				$video = '<div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$ex[1].'" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>';

		} 

		else if($tipo==2){

				$ex = explode('vimeo.com/',$video);
				$video = '<div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'.$ex[1].'" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                        </div>';

		} 

		return $video;

	}


	function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

?>