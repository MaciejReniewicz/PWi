<?php

try
{
$pdo = new PDO('mysql:host=localhost;dbname=zwierzeta', 'root','');
$stmt = $pdo -> query('UPDATE zwierzeta set nazwa = "reksio" where id = 3');

}
catch(PDOException $e)
{
    echo 'Wystąpił błąd biblioteki PDO: ' . $e->getMessage();
}
?>