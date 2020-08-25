<?php
	
	include("../../../includes/topo.php");
?>
	<body>
    <style>
   th {
    text-align: center;
}
    </style>
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

			?>

				<!-- Main Content -->
				<div class="page-wrapper" id="primary">
				<div class="container-fluid">

				<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Notas do Aluno </h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<ol class="breadcrumb">
								<li class="active"><span>página inicial</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
	
	<!------------------------------------------------------------------>

	<?php
	?>
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
		<div class="panel-heading">
			<h6>Arquivos Entregues pelo Aluno</h6>
		</div>
		<div class="panel-wrapper collapse in">
			<div class="panel-body">

			<div class="row">
				<?php

				if(!empty($_POST['nota'])) {
					$id= $_POST['id'];
					$nota= $_POST['nota'];
					$motivo= $_POST['motivo'];
					$insere = $db->select("UPDATE arquivos_alunos SET nota='$nota', motivo= '$motivo' WHERE id= '$id'");
				}

				$verifica_arquivos = $db->select("SELECT * FROM arquivos_alunos WHERE id_aluno = $aluno ORDER BY id DESC");

				while ($linha_arquivos = $db->expand($verifica_arquivos)) {

				$id_aula= $linha_arquivos['id_aula'];

				//echo "<script>alert(".$linha_arquivos['id_aula'].")</script>";


				$search = $db->select("SELECT * FROM aula WHERE id = $id_aula");
				$s = $db->expand($search);


				$extensao = substr($linha_arquivos['arquivo'],-3);

				if ($extensao == 'pdf') {

				echo '
				<div class="col-sm-12" style="border-bottom:1px solid #000;margin-top: 20px">
					<div class="col-sm-3">
						<div class="file-box">
						<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
							<div class="file">
																				
								<div class="icon">
									<i class="fa fa-file-pdf-o"></i>
									</div>
										<div class="file-name">
											'./*$s['titulo']*/'Aula de Matematica'.'
										<br>
									<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
								</div>
							</div>
							</a>
						</div>
					</div>
								<div class="col-sm-9">
									<div class="row">
										<form method="POST">
											<div class="col-md-6">
												<div class="form-group">
												<label class="control-label mb-10">Nota</label>
												<input type="number" name="nota" 
												value="'.$linha_arquivos['nota'].'" id="firstName" class="form-control">
												</div>
																</div>
																<!--/span-->
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Motivo</label>
																		<input type="text" value="'.$linha_arquivos['motivo'].'" name="motivo" id="lastName" class="form-control">
																	</div>
																</div>
																<input type="hidden" name="id" value="'.$linha_arquivos['id'].'" />
																<input type="submit" style="margin-left:15px" value="Enviar" class="btn btn-primary" />

																</form>
																<!--/span-->
															</div>
															</div>
															</div>
																';
															}
															else if ($extensao == 'csv' || $extensao == 'xls' || $extensao == 'xlsx') {

																echo '
																<div class="col-sm-12" style="border-bottom:1px solid #000;margin-top: 20px">
																<div class="col-sm-3">
																	<div class="file-box">
																	<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
																		<div class="file">
																															
																			<div class="icon">
																															<i class="fa fa-file-pdf-o"></i>
																															</div>
																															<div class="file-name">
																																'.$s['titulo'].'
																																<br>
																																<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																															</div>
																														</div>
																													</a>
																												</div>
																												</div>
																										<div class="col-sm-9">
																										<div class="row">
																										<form method="POST">
																											<div class="col-md-6">
																												<div class="form-group">
																													<label class="control-label mb-10">Nota</label>
																													<input type="number" name="nota" 
																													value="'.$linha_arquivos['nota'].'" id="firstName" class="form-control">
																												</div>
																											</div>
																											<!--/span-->
																											<div class="col-md-6">
																												<div class="form-group">
																													<label class="control-label mb-10">Motivo</label>
																													<input type="text" value="'.$linha_arquivos['motivo'].'" name="motivo" id="lastName" class="form-control">
																												</div>
																											</div>
																											<input type="hidden" name="id" value="'.$linha_arquivos['id'].'" />
																											<input type="submit" style="margin-left:15px" value="Enviar" class="btn btn-primary" />
											
																											</form>
																											<!--/span-->
																										</div>
																										</div>
																										</div>
																											';
															}

															else {

																echo '
															<div class="col-sm-12">

																<div class="file-box">
																	<div class="file">
																		<a href="'.ADMIN_DIR.'/arquivos/alunos/'.$linha_arquivos['arquivo'].'" download>
																			
																			<div class="icon">
																				<i class="fa fa-file"></i>
																			</div>
																			<div class="file-name">
																			'.$s['titulo'].'
																				<br>
																				<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																			</div>
																		</a>
																	</div>
																</div>
													</div><hr>


																';

															}
														}


														?>

												</div>
									
								
			</div>
		</div>
	</div>	


<!----------------------------------------------->	
<style>
 td {
	 text-align: center;
 }
</style>		
			<!-- Main Content -->
				<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
				<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Notas Questionário</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>Aula</th>
													<th>Questionário</th>
													<th>Data</th>
													<th>Nota</th>
												  </tr>
												</thead>
												<tbody>

												<?php
													$search= $db->select("SELECT * FROM questionarios WHERE id_disciplina = '$disciplina'");
													$i= $db->expand($search);
													$id_quest= $i['id'];

													$id_aula= $i['id_aula'];

													$busca= $db->select("SELECT * FROM aula WHERE id = '$id_aula'");
													$busca_aula= $db->expand($busca);
 													$titulo_aula= $busca_aula['titulo'];

													$busca = $db->select("SELECT * FROM resp_quest_aluno WHERE id_quest = '$id_quest' ORDER BY id DESC");
													 
													while ($l = $db->expand($busca)):
												?>

												  <tr>
													<td><?php echo $titulo_aula ?></td>
													<td><?php echo  $i['titulo'] ?></td>
													<td><?php echo  $l['data_hora'] ?></td>
													<td><span class="label label-danger">8</span> </td>
												  </tr>

													<?php endwhile; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

                
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<?php

	    	include("../../../includes/include_js.php");

	    ?>
        <script>
		function novaNota() {
			$("#primary").hide();
			$("#secondary").show();

		}


        </script>

	</body>
</html>