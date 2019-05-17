<?php
session_start();
echo $_SESSION["test"] = "Hello World";
echo "</br>";
session_destroy();
?>
<a href="14.php">14</a>
