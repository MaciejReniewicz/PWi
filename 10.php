<?php
$liczba1 = $_POST["liczba1"];
$liczba2 = $_POST["liczba2"];
if(isset($_POST['liczba1'])){
    echo $_POST['liczba1']; 
    echo "</br>";
}
else {
    echo "brak liczby1 </br>";
}
if(isset($_POST['liczba2'])){
    echo $_POST['liczba2'];
    echo "</br>";
}
else {
    echo "brak liczby2 </br>";
}
if($liczba2==0){
    echo "blad";
    echo "</br>";
    
}
else {
echo $liczba1/$liczba2;
echo "</br>";
}
echo $liczba1 * $liczba2;
echo "</br>";
echo $liczba1 + $liczba2;
echo "</br>";
echo $liczba1 - $liczba2;
echo "</br>";

// $_GET $_POST $_SESSION $_COOKIE
?>