<?php

require("../../config.php");

$db = new DB();

$file= $_FILES['file'];

$turmas= $_POST['turmas'];
$new_turmas= implode(',', $turmas);

if(empty($turmas)){
    $new_turmas= '0';
}

echo "Turmas params: ".$new_turmas."<br>";
print_r($file);
echo "<br>Aviso: ".$aviso."<br>";

$upload= new UploadArquivoSis();
$arquivo= $upload->Upload('../../../images/avisos','file');

if(!empty($arquivo)) {
    $sel = $db->select("INSERT INTO avisos SET aviso='$aviso',imagem='$arquivo',turmas='$new_turmas'");
} else {
    $sel = $db->select("INSERT INTO avisos SET aviso='$aviso',turmas='$new_turmas'");
}
$_SESSION['aviso-tipo-ava'] = 'success';
$_SESSION['aviso-mensagem-ava'] = 'Aviso cadasrado com sucesso! ';
header("Location: ../../cadastro_avisos");
exit;