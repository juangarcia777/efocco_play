<?php

	
    require('../../config.php');
    
    require('../../class/class.media.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>EFOCCO - Escola Técnica e Treinamentos</title>

	<meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
	<meta http-equiv="Content-Language" content="pt-br">
	    <meta name="robots" content="no follow" />
	    <meta name="author" content="SIS Tecnologia" />
	    <meta name="description" content="Efocco / Efocco Play a sua plataforma de cursos on-line."/>

	   
	
	
	<!-- Favicon -->
	
	<link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
	
	<!-- vector map CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

	<!-- Calendar CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>

	<!-- Jasny-bootstrap CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
	

	<!-- Bootstrap Colorpicker CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- switchery CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-select CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-tagsinput CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-touchspin CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- multi-select CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Switches CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Datetimepicker CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

	<!--alerts CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap Dropzone CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/Nestable/dist/css/jquery.nestable.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/custom2.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/sweetalert.css" rel="stylesheet" type="text/css">

	<base href="<?php echo SISTEMA_AVA; ?>">

    <link rel="stylesheet" href="<?php echo SISTEMA_AVA; ?>assets/css/pdf.css" >

</head>


<body>

    <div class="container-fluid bg-primary" id="imprimir">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center"><a onclick="window.print()" style="font-size: 48px;color: #FFF" ><i class="fa fa-print"></i></a></div>
            </div>
        </div>
    </div>

    <div class="container mt-50 bg-light" id="conteudo" style="max-width: 900px">
        <div class="row" style="padding: 30px">
            <div class="col-sm-12">
                
                <div class="row">
                    <div class="col-md-3"><img src="assets/imgs/logos/efocco_logo.png" id="logo" alt="Logo"></div>
                    <div class="col-sm-9 text-center">
                    <h3 id="titulo">EFOCCO ESCOLA TÉCNICA</h3>
                   
                        <p class="text-center">Mantido pela EFOCCO Instituição de Ensino EIRELI - ME <br> CNPJ- 19.908.206/0001-42 </p>
                    
                    </div>
                </div>

                <br>
                <br>

                <div class="row">
                    <div class="col-sm-11 text-center" style="margin-left: 20px">
                        <h5><strong><u>FICHA INDIVIDUAL</u></strong></h5>

                        <?php
                        $busca_curso= $db->select("SELECT nome FROM cursos WHERE id='$curso'");
                        $nome_curso= $db->expand($busca_curso);
                        ?>

                        <h6><strong> CURSO: <u id="name_curso"><?php echo $nome_curso['nome']; ?></u></strong></h6>


                    </div>
                </div>

                <br>
                <br>

                <?php
                $db=new DB;
                $search1= $db->select("SELECT * FROM users WHERE id='$aluno'");
                $aluno= $db->expand($search1);
                ?>

                    <div class="row tabela ">

                        <div class="col-sm-12">
                            <div class="line-1">
                                <div class="col-sm-6">
                                    <p>Aluno: <?php echo $aluno['nome']; ?> </p>
                                </div>

                                <div class="col-sm-6">
                                   <p>Data de Conclusão:</p>
                                </div>
                            </div>

                            <div class="line-2">
                                <div class="col-sm-6">
                                   <p>RG: <?php echo $aluno['rg']; ?></p>
                                </div>

                                <div class="col-sm-6">
                                   <p>Localidade: <?php echo $aluno['logradouro']; ?></p> 
                                </div>
                            </div>

                            <div class="line-3">
                                <div class="col-sm-6">
                                   <p>Estado: <?php echo $aluno['estado']; ?></p>
                                </div>

                                <div class="col-sm-3">
                                    <p>Nacionalidade: </p>
                                </div>
                                <div class="col-sm-3">
                                    <p>Data Nasc.: </p>
                                </div>
                            </div>

                            <div class="line-4">
                                <div class="col-sm-6">
                                 <p>Distrito:</p>
                                </div>

                                <div class="col-sm-3" style="width: 50%">
                                     <p>Cidade: <?php echo $aluno['municipio_nascimento']; ?></p>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <div style="width: 100%">
                                <table class="table table-bordered" style="width: 100%">
                                    <thead>
                                            <tr >
                                                <td rowspan="2" class="text-center cabecalho"><h5>Componentes Curriculares</h5></td>
                                                <td colspan="3" class="text-center cabecalho"><h5>Teórico-Prática</h5></td>
                                            </tr>
                                            <tr class="text-center cabecalho">
                                                <td><strong>C.H</strong></td>
                                                <td><strong>MÉDIA</strong></td>
                                                <td><strong>FALTAS</strong></td>
                                            </tr>
                                    </thead>

                                    <tbody>
                                    <?php

                                    $media= 0;
                                    $faltas= 0;
                                    $carga_horaria= 0;

                                    // BUSCA TURMAS E DISCIPLINAS
                                    $search_curso= $db->select("SELECT A.*,B.nome AS disciplina, B.horario
                                                                FROM turma_disciplinas AS A
                                                                LEFT JOIN disciplinas AS B
                                                                ON A.id_disciplina = B.id
                                                                WHERE id_turma='$turma'");

                                    while($turma_retorno = $db->expand($search_curso)) {

                                    $dados= '';
                                    $dados= CalculaMedia($turma_retorno['id_disciplina'], $curso, $turma, $_GET['aluno']);

                                    $media += $dados['media'];
                                    $faltas += $dados['faltas'];
                                    $carga_horaria += $turma_retorno['horario'];

                                    if($media > 10) {
                                        $media =10;
                                    }

                                    ?>

                                        <tr class="text text-start">
                                            <td><?php echo $turma_retorno['disciplina']; ?></td>
                                            <td class="text-center"><?php echo $turma_retorno['horario']; ?></td>
                                            <td class="text-center"><?php echo $dados['media']; ?></td>
                                            <td class="text-center"><?php echo $dados['faltas']; ?></td>
                                        </tr>


                                    <?php } ?>
                                       
                                    </tbody>

                                    <tfoot style="background-color: #f0f0f0">
                                        <tr>
                                            <td  class="text-center"><h5>Total de carga horária</h5></td>
                                            <td class="text-center"><strong><?php echo $carga_horaria; ?></strong></td>
                                            <td class="text-center"><strong><?php echo $media; ?></strong></td>
                                            <td class="text-center"><strong><?php echo $faltas; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-center"><strong>TOTAL DE CARGA HORÁRIA MÓDULO - <?php echo $carga_horaria; ?></strong></td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>

                <div>
                </div>

            </div>
        </div>
    </div>

<?php

	include("../../includes/rodape.php");

?>