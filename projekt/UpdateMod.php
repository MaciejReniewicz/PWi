<?php

	session_start();
    require_once "connect.php";
    
	if (!isset($_SESSION['moderator'])&&$_SESSION['moderator']!=1)
	{
		header('Location: Project.php');
		exit();
	}
    else {
        if(isset($_GET['id'])){
            $user_id = $_GET['id'];
        }
        else{
            header('Location: Admin.php'); 
        }
        if(isset($_GET['is_moderator'])){
            $is_moderator = $_GET['is_moderator'];
        }
        else{
            header('Location: Admin.php');  
        }
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        $polaczenie ->query("UPDATE user SET is_moderator=$is_moderator WHERE id=$user_id"); 
        header('Location: Admin.php'); 
               
    }
    
?>