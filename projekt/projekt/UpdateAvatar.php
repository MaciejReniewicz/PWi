<?php

	session_start();
    require_once "connect.php";
    
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
    else {
          //  $dir = "avatars/";
            $user_id = $_SESSION['id'];
            $file = $_FILES["avatarFile"]["name"];
            if (isset($_FILES["avatarFile"])) { // sprawdzam czy plik zostal podany w formularzu
               // $filetype = strtolower(pathinfo(basename($_FILES["avatarFile"]["name"]), PATHINFO_EXTENSION)); // pobieram rozszerzenie pliku
               // $file = $dir . hash("sha1", $user_id) . "." . $filetype; // tworze unikalna nazwe pliku na podstawie hashcode
                $check = getimagesize($_FILES["avatarFile"]["tmp_name"]); // sprawdzam czy plik jest obrazkiem
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                //    move_uploaded_file($_FILES["avatarFile"]["tmp_name"], $file); // przesylam pliki na serwer
                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                    $polaczenie ->query("UPDATE user SET avatar='$file' WHERE id=$user_id"); // wprowadzam sciezke do pliku w bazie
                    $_SESSION['awatar']=$file;
                    header('Location: User.php'); // wypierdala na index php po zrobieniu roboty
                } 
                else {
                    echo "File is not an image.";
                    header('Location: User.php');
                }
            } 
            else{
                header("Location: User.php");
            }
    }
    
?>