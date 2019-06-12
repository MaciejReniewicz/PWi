<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.php');
	}
    else{   
            $opis = $_GET['Description'];
            $id_usera = $_SESSION['id'];
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
                        if ($polaczenie->query("UPDATE user set description = '$opis' where id = '$id_usera'"))
                        {   
                            $_SESSION['opis']=$opis;
                            header('Location: User.php');
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