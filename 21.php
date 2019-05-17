<?php

try
{
$pdo = new PDO('mysql:host=localhost;dbname=zwierzeta', 'root','');
$stmt = $pdo -> query('Select gatunek,wiek from zwierzeta');
foreach ($stmt as $row)
    {
        echo '<li>'.$row['gatunek'],': '.$row['wiek'].'</li>';
    }

}
catch(PDOException $e)
{
    echo 'Wystąpił błąd biblioteki PDO: ' . $e->getMessage();
}
?>