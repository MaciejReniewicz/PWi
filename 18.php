<?php 
$varTemp= $_POST["qatxt1"];
echo $_POST["qatxt1"];
$fp = fopen('helloworld.txt', 'w');
fwrite($fp, $_POST["qatxt1"]);
fclose($fp);
?>