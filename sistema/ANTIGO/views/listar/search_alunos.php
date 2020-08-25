<?php
	
	include("../../includes/topo.php");
?>
<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper">
    		<?php

				include("../../includes/menu_topo.php");

			?>

			<?php

				include("../../includes/menu_admin.php");

			?>
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listar Alunos Cadastrados</h5>
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
                        <a href="<?php echo SISTEMA_DIR ?>listar_alunos" class="btn btn-small btn-primary btn-rounded btn-icon left-icon"> <i class="fa fa-arrow-left"></i> <span>voltar</span></a>

							<div class="panel-heading">
                            

								<div class="pull-left">
									<h6 class="panel-title txt-dark">Exportar</h6>
								</div>
                                
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">

									<?php

										if (isset($_SESSION['exclusao-realizada']) && $_SESSION['exclusao-realizada'] == 1) {

											echo '

											<div class="alert alert-success alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<i class="ti-check pr-15"></i>A exclusão foi realizada com sucesso! 
											</div>


											';

										}

										unset($_SESSION['exclusao-realizada']);

									?>
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="alunos" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Telefone</th>
														<th>Celular</th>
														<th>CPF</th>
														<th>RG</th>
														<th></th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Nome</th>
														<th>Telefone</th>
														<th>Celular</th>
														<th>CPF</th>
														<th>RG</th>
														<th></th>
													</tr>
												</tfoot>
												<tbody id="doc">

													<?php

														$verifica = $db->select("SELECT * FROM users WHERE turma LIKE '%$turma%' ");

													
														while ($linha = $db->expand($verifica)) {

															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>'.$linha['telefone_aluno'].'</td>';
																echo '<td>'.$linha['celular_aluno'].'</td>';
																echo '<td>'.$linha['cpf'].'</td>';
																echo '<td>'.$linha['rg'].'</td>';
																echo '<td>

																<a onclick="delete_registro('.$linha['id'].',2)" class="btn btn-danger btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

																<a href="editar_alunos/'.$linha['id'].'" class="btn btn-default btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-pencil"></i></a>

																<a href="infos_alunos/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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

			include("../../includes/rodape.php");

			?>
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	
    <?php

    		include("../../includes/include_js.php");

    ?>


	
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#alunos').DataTable( {

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
				    "sSearch": "FILTRAR",
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
