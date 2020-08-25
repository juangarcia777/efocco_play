<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/modais.php"); ?>

<style type="text/css">body{overflow: hidden;}</style>

<div class="wrapper" id="pagina-disciplina">

    <nav id="sidebar">
       <div class="ajuste"> 
            <?php require ("aulas_materia.php"); ?>         
       </div>
    </nav>
    
    <div id="content">
        <?php require ("includes/topo_aulas.php"); ?>
        <div id="div-verifica-mobile" class="d-block d-sm-none"></div>
		<div class="body-assisti-aula" id="body-assisti-aula"></div>
    </div>

</div>






<?php require ("../../includes/footer.php"); ?>
