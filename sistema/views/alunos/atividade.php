<?php
	
	include("../../includes/topo.php");
?>
<link rel="stylesheet" href="<?php echo SISTEMA_DIR ?>src/scss/atividade.css">


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

				include("../../includes/menu.php");

			?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

            <?php require '../../controlers/alunos/pega_atividade.php' ?>

				<!-- Title -->

				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">EFOCCO - Escola Técnica e Treinamentos / Atividade x </h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<ol class="breadcrumb">
							<li class="active"><span>página inicial</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
			

				<!-- Row -->
				<a href="../" class="btn btn-warning" style="margin-bottom:20px">Voltar</a>
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Questões</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="panel-group accordion-struct" id="accordion_1" role="tablist" aria-multiselectable="false">
											
										<?php require  '../../controlers/alunos/get_perguntas.php'; ?>
										
										
										</div>
									</div>
								</div>
							</div>

					</div>
					</div>
					<!-- /Row -->



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

<script>
   


	//---ALERT----


	$('#fim').on('click',function(e){
        swal({   
			title: "Bom Trabalho!",   
             type: "success", 
			text: "Missão Cumprida",
			confirmButtonColor: "#3cb878",   
		});
		setTimeout("volta()", 3000); 
		return false;
	});
	
	function volta() {
		window.location.href= "../atividade_item/1";
	}

		//-----FIM ALERT-----


</script>



</body>
</html>
