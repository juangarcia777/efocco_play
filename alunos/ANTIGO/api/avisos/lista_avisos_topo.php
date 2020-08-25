<?php
//sleep(2);
require_once("../../ambiente.php");
$url = URL_NODE_BACKEND."Avisos/12/4";
$json = file_get_contents($url);
$json = json_decode($json, TRUE);
$json= array_reverse($json);
foreach ($json as $valor){
?>    
 	
 	<li class="msg-list-item d-flex justify-content-between">
		<div class="msg-content notification-content">
        	<a href="home"><?php echo $valor["titulo"]; ?></a>,<br>
			<p><?php echo $valor["mensagem"]; ?></p>
        </div>
        
        <div class="msg-time">
        	<p><?php echo date("d/m/Y"); ?></p>
       	</div>
   	</li>


<?php    
}
?>