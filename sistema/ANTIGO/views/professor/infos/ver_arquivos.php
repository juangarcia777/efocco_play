<?php
	
	include("../../../includes/topo.php");


?>
<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper">
    		<?php

				include("../../../includes/menu_topo.php");

			?>

			<?php

                include("../../../includes/menu_prof.php");
                
                
	/* SELECIONA AS INFORMAÇÕES PARA SEREM MOSTRADAS */
	$db = new DB();
	$verifica_turma = $db->select("SELECT * FROM turma WHERE id = '$id_turma'");
	$linha_turma = $db->expand($verifica_turma);
	$id_turma = $linha_turma['id'];

	$verifica_disciplina = $db->select("SELECT * FROM disciplinas WHERE id = '$id_disciplina'");
	$linha_disciplina = $db->expand($verifica_disciplina);
	$id_disciplina = $linha_disciplina['id'];


			?>
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Vendo Arquivos do Aluno</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<ol class="breadcrumb">
							<li class="active"><span>página inicial</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->


                	<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Clique para baixar os arquivos</h6>
                                        <hr>
                                        <!--<a onclick="limpar()" class="btn btn-danger">Limpar todos os arquivos</a>-->
                                        <input type="hidden" name="id_aluno" >
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<h4 class="mb-10"></h4>
												<div class="row">
													<div class="col-lg-12">
														<?php

														$verifica_arquivos = $db->select("SELECT * FROM arquivos_alunos WHERE id_aluno = '$id_aluno' ORDER BY id DESC");

														while ($linha_arquivos = $db->expand($verifica_arquivos)) {

															$extensao = substr($linha_arquivos['arquivo'],-3);

															if ($extensao == 'pdf') {

																echo '
																	<div class="file-box">
																		<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
																			<div class="file">
																				
																				<div class="icon">
																					<i class="fa fa-file-pdf-o"></i>
																				</div>
																				<div class="file-name">
																					'.$linha_arquivos['nome'].'
																					<br>
																					<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																				</div>
																			</div>
																		</a>
																	</div>
																';
															}
															else if ($extensao == 'csv' || $extensao == 'xls' || $extensao == 'xlsx') {

																echo '

																	<div class="file-box">
																		<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
																			<div class="file">
																				
																				<div class="icon">
																					<i class="fa fa-bar-chart-o"></i>
																				</div>
																				<div class="file-name">
																					'.$linha_arquivos['nome'].'
																					<br>
																					<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																				</div>
																			</div>
																		</a>
																	</div>
																';
															}

															else {

																echo '

																<div class="file-box">
																	<div class="file">
																		<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
																			
																			<div class="icon">
																				<i class="fa fa-file"></i>
																			</div>
																			<div class="file-name">
																				'.$linha_arquivos['nome'].'
																				<br>
																				<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																			</div>
																		</a>
																	</div>
																</div>

																';

															}
														}

														?>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->





			</div>
			
			<?php

			include("../../../includes/rodape.php");

			?>
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	
    <?php

    		include("../../../includes/include_js.php");

    ?>


	
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#turma').DataTable( {

	    	
			buttons: [
				{
	                
	               
	                pageSize: 'LEGAL'
	            },
				
			],
		    "language": {
				    "sEmptyTable": "Nenhum registro encontrado",
				    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
				    "sLengthMenu": "_MENU_ resultados por página",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
				    "sZeroRecords": "Nenhum registro encontrado",
				    "sSearch": "Pesquisar",
				    "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    },
				    "select": {
				        "rows": {
				            "_": "Selecionado %d linhas",
				            "0": "Nenhuma linha selecionada",
				            "1": "Selecionado 1 linha"
				        }
				    }
				}
		    } );
	} );

	$(document).ready(function() {
	    $('#aulas').DataTable( {

	    	dom: 'Bfrtip',
			buttons: [
				{
	                extend: 'pdfHtml5',
	                orientation: 'landscape',
	                pageSize: 'LEGAL'
	            },
				'csv', 'excel'
			],
		    "language": {
				    "sEmptyTable": "Nenhum registro encontrado",
				    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
				    "sLengthMenu": "_MENU_ resultados por página",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
				    "sZeroRecords": "Nenhum registro encontrado",
				    "sSearch": "Pesquisar",
				    "oPaginate": {
				        "sNext": "Próximo",
				        "sPrevious": "Anterior",
				        "sFirst": "Primeiro",
				        "sLast": "Último"
				    },
				    "oAria": {
				        "sSortAscending": ": Ordenar colunas de forma ascendente",
				        "sSortDescending": ": Ordenar colunas de forma descendente"
				    },
				    "select": {
				        "rows": {
				            "_": "Selecionado %d linhas",
				            "0": "Nenhuma linha selecionada",
				            "1": "Selecionado 1 linha"
				        }
				    }
				}
		    } );
    } );
    
    function limpar() {
         //Warning Message
    $('#sa-warning').on('click',function(e){
	    swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this imaginary file!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#fcb03b",   
            confirmButtonText: "Yes, delete it!",   
            closeOnConfirm: false 
        }, function(){   
            swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
        });
		return false;
    });
    }


</script>
