<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">

	<div class="col-md-12">
		<form method="get">
		<input type="hidden" name="pesquisa">	
		<div class="panel panel-default card-view">
			<div class="row">
				
				<div class="col-md-5">					
						<select name="turma" class="form-control " required >
						<option value="">--Todas as turmas--</option>
						<?php 
							$id_turma = 0;
							if(isset($turma) && !empty($turma)){
								$id_turma = $turma;
								$sel = $db->select("SELECT id, nome FROM turma WHERE id='$turma' LIMIT 1");
								$row= $db->expand($sel);
								echo '<option value="'.$row['id'].'" selected>'.$row['nome'].'</option>';	
							}

							if($AdministradorAVA!=0){

								$sel = $db->select("SELECT turma.id, turma.nome 
								FROM turma WHERE id!='$id_turma' ORDER BY nome ");

							} else if($CoordenadorTurma!=0){	

								$sel = $db->select("SELECT turma.id, turma.nome 
								FROM turma 
								WHERE id!='$id_turma' AND coordenador_turma='$id_logado' ORDER BY nome ");

							} else {


								$sel = $db->select("SELECT turma.id, turma.nome, disciplinas.professor, turma_disciplinas.id_disciplina 
								FROM turma 
								LEFT JOIN turma_disciplinas ON turma.id=turma_disciplinas.id_turma
								LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
								WHERE turma.id!='$id_turma' AND disciplinas.professor='$id_logado'
								GROUP BY turma.id
								ORDER BY turma.nome ");


							}

								

							while ($row= $db->expand($sel)) {
								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
							}
						?>
					</select>	
				</div>

                <div class="col-md-4">
					<select name="disciplina" id="disciplina"class="form-control ">
                        <option value="">--Selecione</option>
                        <option value="0">GERAR TODOS</option>
                        <option value="1">LUIZ CARLOS DAMASCENO</option>
                        <option value="2">ANDRÉIA ROBERTA DA SILVA FONSECA</option>
					</select>	
				</div>	

				

				<div class="col-md-3">
					<a class="btn btn-primary" id="gera" target="_blank">GERAR CERTIFICADOS</a>	
				</div>	
			</div>				
		</div>	
		</form>
	</div>	

	

</div>
</div>	
</div>

<a href="cria-nova-aula">
    <div class="new_aula_button"><i class="fa  fa-plus"></i></div>
</a>


<script>

</script>

<?php include("../../includes/rodape.php"); ?>

<script>
    $('#disciplina').on('change',function() {
        var valor= $('#disciplina').val();
        if(valor == 0) {
            $('#gera').attr('href','views/certificados/gera_certificados/Doc1.pdf');
        }
        if(valor == 1) {
            $('#gera').attr('href','views/certificados/gera_certificados/luiz.pdf');
        }
        if(valor == 2) {
            $('#gera').attr('href','views/certificados/gera_certificados/andreia.pdf');
        }
    });
</script>