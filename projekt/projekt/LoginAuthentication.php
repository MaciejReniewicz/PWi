<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: login.php');
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM user WHERE nick='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				
				if (password_verify($haslo, $wiersz['password']))
				{
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['nick'] = $wiersz['nick'];
					$_SESSION['email'] = $wiersz['email'];
					$_SESSION['plec'] = $wiersz['gender'];
					$_SESSION['stworzony'] = $wiersz['created'];
					$_SESSION['awatar'] = $wiersz['avatar'];
					$_SESSION['ostatnia_aktywnosc'] = $wiersz['last_activity'];
					$_SESSION['moderator'] = $wiersz['is_moderator'];
					$_SESSION['aktywny'] = $wiersz['is_active'];
					$_SESSION['opis'] = $wiersz['description'];
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: Project.php');
				}
				else 
				{
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					//header('Location: login.php');
				}
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				//header('Location: login.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>