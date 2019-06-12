<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
		exit();
	}
    else {
        $user_id = $_SESSION['id'];
        if(isset($_POST['comments'])){
        $comments= $_POST['comments'];
        }
        else{
        $comments =$_GET['comments'];
        }
        if(isset($_GET['thread_id'])){
            $id_watku = $_GET['thread_id'];
        }
        else{
            $id_watku = $_GET["id_watku"];
        }
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
            
            try 
            {
                $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                if ($polaczenie->connect_errno!=0)
                {
                    throw new Exception(mysqli_connect_errno());
                }
                else
                {   
                        $thread_id = $polaczenie->query("select thread_id from post where id=$id_watku");
                        if ($polaczenie->query("INSERT INTO post VALUES (NULL, '$comments',now(), '$user_id','$id_watku')"))
                        {
                            $polaczenie->query("UPDATE user set last_activity = now() where id=$user_id");
                            $_SESSION['ostatnia_aktywnosc']=date("Y-m-d H:i:s");
                            $polaczenie->query("UPDATE thread set last_post = now() where id=$id_watku");
                            header('Location: Project.php'); 
                        }
                        else
                        {
                            throw new Exception($polaczenie->error);
                        }

                    $polaczenie->close();
                }
                
            }
            catch(Exception $e)
            {
                echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
                echo '<br />Informacja developerska: '.$e;
                exit();
            }
    }
?>