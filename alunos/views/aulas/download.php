<?php
$theFile = $_GET['file'];

 $file_url  = stripslashes( trim( $theFile ) );
 //get filename
 $file_name = basename( $theFile );
 //get fileextension    
 $file_extension = pathinfo($file_name);
 //security check
 $fileName = strtolower($file_url);

 //var_dump($file_url, $file_name, $file_extension); die();
 //var_dump($file_name); die();

 $file_new_name = $file_name;


 header("Expires: 0");
 header("Cache-Control: no-cache, no-store, must-revalidate");
 header('Cache-Control: pre-check=0, post-check=0, max-age=0', false);
 header("Pragma: no-cache");
 header("Content-type: application/pdf");
 header("Content-Disposition:attachment; filename={$file_new_name}");
 header("Content-Type: application/force-download");

 readfile("{$file_url}");

 exit();

 ?>