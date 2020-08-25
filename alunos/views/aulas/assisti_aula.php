<?php
require ("../../config.php");

$InformacoesAula = $Pesquisa->InformacoesAula($id);
$video = video_aula($InformacoesAula['video_aula'],$InformacoesAula['tipo_video']); 
$InformacoesDisciplina= $Pesquisa->InformacoesDisciplina($InformacoesAula['id_disciplina']);
?>

<div class="row row-big">
	
	<input type="hidden" id="id_aula_setada" value="<?php echo $id; ?>">
	<input type="hidden" id="video_aula" value="<?php if(!empty($video)){ echo 1; }?>">
	<input type="hidden" id="disciplina" value="<?php echo $InformacoesAula['id_disciplina']; ?>">
	<input type="hidden" id="turma" value="<?php echo $_SESSION['CursoSelecionadoAVA']; ?>">
	<input type="hidden" id="aluno_logado" value="<?php echo $_SESSION['UserLogadoAVA']; ?>">
	
	<?php if(!empty($video)){ ?>
		<div class="col-md-12  ">
			<?php echo $video; ?>
		</div>

		

	<?php } ?>	
</div>

		<?php if(!empty($video)){ ?>
		<div class="col-md-12 mbottom30 ajuste-conteudo-aula" style="margin-top:30px">
			<h6>Tempo total do vídeo: 
			<b><span class="text" id="tempo">---</span></b></h6>
		</div>
		<?php } ?>	

	<div class="col-md-12 ajuste-conteudo-aula">
		<h3 class="titulo_aula_grande"><?php echo $InformacoesAula['titulo']; ?></h3>				
	</div>


	<?php 
		$tempo = array($InformacoesAula['glossario'],$InformacoesAula['objetivo_aula'],$InformacoesAula['apresentacao'],$InformacoesAula['apresentacao'],$InformacoesAula['doc_complementares'],$InformacoesAula['ref_bibliograficas']);
		$tempo_leitura = tempo_leitura($tempo); 
	?>

	<div class="col-md-12 mtop0 ajuste-conteudo-aula">
		<span class="data_hora_aula_grande"><i class="icofont-clock-time"></i> 
			Tempo de leitura <?php echo $tempo_leitura; ?> minuto(s)
		</span>
	</div>



		<?php if(!empty($InformacoesAula['link_aovivo']) && ($InformacoesAula['data_final_link_aovivo']>=date("Y-m-d") || $InformacoesAula['data_final_link_aovivo']=='0000-00-00')){ ?>
			<div class="col-md-12 mtop30 ajuste-conteudo-aula">
				<div class="texto_aula_grande">Clique no botão abaixo para acessar a aula ao vivo!</div>
			</div>	
			<div class="col-md-12 mtop10 ajuste-conteudo-aula">		
				<a href="<?php echo $InformacoesAula['link_aovivo']; ?>" target="_blank"><button class="btn btn-success btn-lg"><i class="icofont-ui-play"></i> ASSISTIR AULA AO VIVO</button></a>
			</div>	
		<?php } ?>

	
	<?php if(!empty($InformacoesAula['curriculo'])){ ?>	
		<div class="col-md-12 mtop20 ajuste-conteudo-aula">

		
			<h3 class="titulo_aula_grande">
			<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Currículo Professor <i class="icofont-simple-down"></i></a></h3>
		
		<div class="collapse" id="collapseExample">
			<div class="card card-body">
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['curriculo']); ?></div>
			</div>
		</div>
		</div>	
	<?php } ?>

	<?php if(!empty($InformacoesAula['objetivo_aula'])){ ?>	
		<div class="col-md-12 mtop20 ajuste-conteudo-aula">
			<h3 class="titulo_aula_grande">Objetivo da Aula</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['objetivo_aula']); ?></div>
		</div>	
	<?php } ?>

	<div class="col-md-12 mtop20 ajuste-conteudo-aula">
		<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['apresentacao']); ?></div>
	</div>	

	<?php if(!empty($InformacoesAula['doc_complementares'])){ ?>	
		<div class="col-md-12 mtop20 ajuste-conteudo-aula">
			<h3 class="titulo_aula_grande">Documentos Complementares</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['doc_complementares']); ?></div>
		</div>	
	<?php } ?>

	<?php if(!empty($InformacoesAula['ref_bibliograficas'])){ ?>	
		<div class="col-md-12 mtop20 ajuste-conteudo-aula">
			<h3 class="titulo_aula_grande">Referências Bibliográficas</h3>	
			<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['ref_bibliograficas']); ?></div>
		</div>	
	<?php } ?>


	<div class="btn-group-fab" role="group" aria-label="FAB Menu">
		<div>
			<button type="button" class="btn btn-main btn-default has-tooltip" data-placement="left" title="Menu">
			<i class="icofont-plus"></i> </button>

			<button type="button"  data-toggle="modal" data-target="#ModalDuvidasAula" class="btn btn-sub btn-info has-tooltip" data-placement="left" title="Fullscreen">
			<i class="icofont-question"></i> </button>

			<button type="button"  data-toggle="modal" data-target="#ModalUploadAula" class="btn btn-sub btn-danger has-tooltip" data-placement="left" title="Save">
				<i class="icofont-upload-alt"></i> </button>

			<button type="button"  data-toggle="modal" data-target="#ModalAnotacoes" onclick="buscaNotas()" class="btn btn-sub btn-warning has-tooltip" data-placement="left" title="Download">
				 <i class="icofont-pencil"></i> </button>
		</div>
	</div>
	

	<script src="<?php echo SITE_AVA; ?>assets/js/vimeo_integration.js"></script>

	
<script>
	$(function() {
  $('.btn-group-fab').on('click', '.btn', function() {
    $('.btn-group-fab').toggleClass('active');
  });
  $('has-tooltip').tooltip();
});
</script>