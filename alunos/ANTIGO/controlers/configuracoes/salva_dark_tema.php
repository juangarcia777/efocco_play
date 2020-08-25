<?php
@session_start();
$dark = $_POST['dark'];

if($dark==1){
	$_SESSION['DarkThemeAVA']=1;
} else {
	unset($_SESSION['DarkThemeAVA']);
}


?>