<?php

	session_start();
	
	if (!isset($_POST['Subject']) || !isset($_GET['nazwa_podrozdzialu']) || !isset($_POST['comments']))
	{
		header('Location: NewThread.php');
	}
    else{   
            $Subject = $_POST['Subject'];
            $Subsection = $_GET['nazwa_podrozdzialu'];
            $user_id = $_SESSION['id']; 
            $comments = $_POST['comments'];
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
                        if ($polaczenie->query("INSERT INTO thread VALUES (NULL,'$Subject',now(),'$Subsection','$user_id',1,0,now())"))
                        {   
                            $thread_id = $polaczenie->insert_id;
                            header('Location: CreatePost.php?comments='.$comments.'&thread_id='.$thread_id);
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