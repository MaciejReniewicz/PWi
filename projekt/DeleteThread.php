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
            $thread_id = $_GET['id'];
        }
        else{
            header('Location: Admin.php'); 
        }
        
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        $polaczenie ->query("Delete from thread WHERE id=$thread_id"); 
        header('Location: Admin.php');       
    }
    
?>