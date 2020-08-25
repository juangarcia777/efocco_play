<?php
require ("../../config.php");

$InformacoesAula = $Pesquisa->InformacoesAula($id);
$video = video_aula($InformacoesAula['video_aula'],$InformacoesAula['tipo_video']); 
?>

<div class="row">
	<input type="hidden" id="id_aula_setada" value="<?php echo $id; ?>">
	
	<?php if(!empty($video)){ ?>
		<div class="col-md-12 mbottom30">
			<?php echo $video; ?>
		</div>		
	<?php } ?>	

	<div class="col-md-12">
		<h3 class="titulo_aula_grande"><?php echo $InformacoesAula['titulo']; ?></h3>		
	</div>

	<div class="col-md-12 mtop10">
		<span class="data_hora_aula_grande"><i class="icofont-calendar"></i> <?php echo formata_data_hora($InformacoesAula['data_criacao']); ?></span>
	</div>

		<?php if(!empty($InformacoesAula['link_aovivo']) && $InformacoesAula['data_final_link_aovivo']>=date("Y-m-d")){ ?>
			<div class="col-md-12 mtop30">
				<div class="texto_aula_grande">Clique no botão abaixo para acessar a aula ao vivo!</div>
			</div>	
			<div class="col-md-12 mtop10">		
				<a href="<?php echo $InformacoesAula['link_aovivo']; ?>" target="_blank"><button class="btn btn-success btn-lg"><i class="icofont-ui-play"></i> ASSISTIR AULA AO VIVO</button></a>
			</div>	
		<?php } ?>

	
	<?php if(!empty($InformacoesAula['curriculo_professor'])){ ?>	
		<div class="col-md-12 mtop20">
			<h3 class="titulo_aula_grande">Currículo Professor</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['curriculo_professor']); ?></div>
		</div>	
	<?php } ?>

	<?php if(!empty($InformacoesAula['objetivo_aula'])){ ?>	
		<div class="col-md-12 mtop20">
			<h3 class="titulo_aula_grande">Objetivo da Aula</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['objetivo_aula']); ?></div>
		</div>	
	<?php } ?>

	<div class="col-md-12 mtop20">
		<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['apresentacao']); ?></div>
	</div>	

	<?php if(!empty($InformacoesAula['doc_complementares'])){ ?>	
		<div class="col-md-12 mtop20">
			<h3 class="titulo_aula_grande">Documentos Complementares</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['doc_complementares']); ?></div>
		</div>	
	<?php } ?>

	<?php if(!empty($InformacoesAula['ref_bibliograficas'])){ ?>	
		<div class="col-md-12 mtop20">
			<h3 class="titulo_aula_grande">Referências Bibliográficas</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['ref_bibliograficas']); ?></div>
		</div>	
	<?php } ?>


	

</div>	

<a href="javascript:void(0)" data-toggle="modal" data-target="#ModalDuvidasAula"><div class="duvidas_botao_aulas"><i class="icofont-question-circle"></i></div></a>