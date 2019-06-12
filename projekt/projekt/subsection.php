<?php

    session_start();
    $nazwa_podrozdzialu = $_GET['nazwa_podrozdzialu'];

    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
        $rezultat1 = @$polaczenie->query("SELECT * FROM thread join user on thread.user_id = user.id WHERE subsection='$nazwa_podrozdzialu' and is_sticky!=1 order by last_post desc");
           
        $rezultat2 = @$polaczenie->query("SELECT * FROM thread join user on thread.user_id = user.id WHERE subsection='$nazwa_podrozdzialu' and is_sticky=1 order by last_post");
        
            
      
        $polaczenie->close();
    }



?>

<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title><?=$nazwa_podrozdzialu?></title>

</head>

<body>
    <div class="mainbody container-fluid">
        <nav class="navbar fixed-top navbar-expand-md border border-light">
            <a class="navbar-brand" href="Project.php"><img src="logo.jpg" width="30" height="30"
                    class="d-inline-block mr-1 align-bottom" alt=""> For the Horde</a>

            <button class="navbar-toggler bg-danger" type="button" data-toggle="collapse" data-target="#mainmenu"
                aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="mainmenu">
            <ul class="navbar-nav">
                <?php
                    
                    if (!isset($_SESSION['zalogowany'])){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="login.php">' ;
                        echo'Login' ;
                        echo'</a>';
                        echo'</li>';
                    }
                    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="User.php">';
                        echo'Profile' ;
                        echo'</a>';
                        echo'</li>';
                    }
                    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="logout.php">';
                        echo'Logout' ;
                        echo'</a>';
                        echo'</li>';
                    }
                    if (!isset($_SESSION['zalogowany'])){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="register.php">';
                        echo'Register' ;
                        echo'</a>';
                        echo'</li>';
                    }
                ?>
                </ul>

            </div>
        </nav>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb border border-light">
                <li class="breadcrumb-item" style="font-size: 20px;"><a href="Project.php">Project</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px"><?=$nazwa_podrozdzialu?></li>
            </ol>
        </nav>

        <div class="main col-md-12 col-xl-10 offset-md-0 offset-xl-1 border border-light mb-5">
            <div class="area container mx-auto">
            Sticky Threads
                <?php
                while($row2 = $rezultat2->fetch_row()){
                    ?>
                    <a href="Post.php?nazwa_podrozdzialu=<?=$nazwa_podrozdzialu?>&nazwa_watku=<?php printf("%s", $row2[1]);?>">
                            <div class="mainrow row border border-light">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="subject col-12">
                                            <p class="p" style="float-left">Subject: <?php printf("%s", $row2[1]);?> </p>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-1">
                                <div class="comments row">
                                    <p class="p">ID: <?php printf("%s", $row2[0]);?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row originalposter">
                                    <p class="p">Poster: <?php printf("%s", $row2[9]);?></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row date">
                                    <p class="p">Last Post: <?php printf("%s", $row2[7]);?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php 
                }
                    ?>

            </div>



            <div class="area container mx-auto">
                <?=$nazwa_podrozdzialu?>
                <div class="row">
                    <div class="col-12 my-2 px-0">
                        <a href="NewThread.php?nazwa_podrozdzialu=<?=$nazwa_podrozdzialu?>">
                           <div class="btnSubmit bg-danger" style="border-radius: 10px;width:100px;padding-left:5px">New Thread</div>
                        </a>
                    </div>
                </div>
                <?php
                while($row1 = $rezultat1->fetch_row()){
                    ?>
                    <a href="Post.php?nazwa_podrozdzialu=<?=$nazwa_podrozdzialu?>&nazwa_watku=<?php printf("%s", $row1[1]);?>">
                            <div class="mainrow row border border-light">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="subject col-12">
                                            <p class="p" style="float-left">Subject: <?php printf("%s", $row1[1]);?> </p>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-1">
                                <div class="comments row">
                                    <p class="p">ID: <?php printf("%s", $row1[0]);?></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row originalposter">
                                    <p class="p">Poster: <?php printf("%s", $row1[9]);?></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row date">
                                    <p class="p">Last Post: <?php printf("%s", $row1[7]);?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php 
                }
                    ?>
            </div>
        </div>
    </div>

    <footer class=" col-12 border border-light">
        <div class="row-fluid">
            Made by Maciej Reniewicz Lab-3 76031
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>