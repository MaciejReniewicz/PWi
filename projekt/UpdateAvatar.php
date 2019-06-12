<?php

	session_start();
    require_once "connect.php";
    
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
    else {
            $user_id = $_SESSION['id'];
            $file = $_FILES["avatarFile"]["name"];
            if (isset($_FILES["avatarFile"])) {
                $check = getimagesize($_FILES["avatarFile"]["tmp_name"]); 
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                    $polaczenie ->query("UPDATE user SET avatar='$file' WHERE id=$user_id");
                    $_SESSION['awatar']=$file;
                    header('Location: User.php?id='.$user_id);
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