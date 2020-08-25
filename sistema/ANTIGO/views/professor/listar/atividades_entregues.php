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
						<h5 class="txt-light"><?php echo $linha_disciplina['nome']; ?></h5>
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
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<h4 class="mb-10">Alunos</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>CPF</th>
														<th>Status</th>
														<th style="text-align: center;"></th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Nome</th>
														<th>CPF</th>
														<th style="text-align: center;">Status</th>
														<th></th>
													</tr>
												</tfoot>
												<tbody>

													<?php

														$verifica_aluno = $db->select("SELECT users.*, turma_alunos.status FROM users INNER JOIN turma_alunos ON users.id = turma_alunos.id_aluno AND turma_alunos.id_turma = '$id_turma'");

													
														while ($linha_aluno = $db->expand($verifica_aluno)) {

															switch ($linha_aluno['status']) {
																case 'Transferido':
																	$status_label = '<span class="label label-info capitalize-font inline-block ml-10" style="font-size: 12px; background: orange;">'.$linha_aluno['status'].'</span>';
																	break;

																case 'Trancado':
																	$status_label = '<span class="label label-info capitalize-font inline-block ml-10" style="font-size: 12px; background: blue;">'.$linha_aluno['status'].'</span>';
																	break;

																case 'Cancelado':
																	$status_label = '<span class="label label-info capitalize-font inline-block ml-10" style="font-size: 12px; background: red;">'.$linha_aluno['status'].'</span>';
																	break;

																case 'Ativo':
																	$status_label = '<span class="label label-info capitalize-font inline-block ml-10" style="font-size: 12px; background: green;">'.$linha_aluno['status'].'</span>';
																	break;

																case 'Evadido':
																	$status_label = '<span class="label label-info capitalize-font inline-block ml-10" style="font-size: 12px; background: purple;">'.$linha_aluno['status'].'</span>';
																	break;
																
															}

															echo '<tr>';
																echo '<td>'.$linha_aluno['nome'].'</td>';
																echo '<td>'.$linha_aluno['cpf'].'</td>';
																echo '<td style="text-align: center;">'.$status_label.'</td>';
																echo '<td>

																<a href="'.ADMIN_DIR.'ver_arquivos/'.$id_turma.'/'.$linha_aluno['id'].'/'.$id_disciplina.'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																</td>';
															echo '</tr>';

														}
						
													?>
														
												</tbody>
											</table>
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


</script>
