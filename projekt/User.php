<?php

    session_start();
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    }
    else{
        header("Location:Project.php");
    }
    $stworzony=$_SESSION['stworzony'];
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=0;
    }

    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	 
        if ($rezultat1 = @$polaczenie->query("SELECT count(post.id) FROM post join user on post.user_id = user.id WHERE user.id=$id")){
            $row1=$rezultat1->fetch_row();   
            $rezultat2 = @$polaczenie->query("SELECT * from user WHERE user.id=$id"); 
            $row2=$rezultat2->fetch_row();

        }
        else {echo "Connection error";
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
    <title>User</title>

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

            <div class="collapse navbar-collapse justify-content-end " id="mainmenu">
              
                <ul class="navbar-nav ">
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
                <li class="breadcrumb-item"><a href="Project.php">Project</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php printf("%s",$row2[1])?></li>
            </ol>
        </nav>
        <div class="main col-sm-12 col-md-10 offset-sm-0 offset-md-1 border border-light mb-1"
            style="padding-bottom:10px;">
            <div class="area">
                <div class="subjectrow row-fluid" style="border-radius: 15px 50px 15px 50px;">
                    <p style="padding-left:20px;"><?php printf("%s",$row2[1])?></p>
                </div>
                <div class="post row">
                    <div class="col-sm-12 col-lg-3" style="padding-top:40px">
                            <div class="postuser row pb-1">
                                <img src="avatars/<?php printf("%s",$row2[6])?>" class="border border-dark figureimg" alt="">
                            </div>
                        
                        <form action="UpdateAvatar.php" method="post" enctype="multipart/form-data" >
                        <?php if($_SESSION['id']==$id){ ?>
                        <input type="file" style="padding-left:10%;padding-top:10%;" name="avatarFile" />
                        <input type="submit" style="margin-left:40%;margin-top:10%" value="upload" />
                        <?php } ?>
                        </form>

                    </div>
                    <div class="col-sm-12 col-lg-9">    
                        <div class="row">
                            <div class="usersection container mx-auto border border-dark">
                                Statistics
                                <table class="usertable table bg-light">
                                        <thead>
                                          <tr>
                                            <th class="border border-light" scope="col">#</th>
                                            <th class="border border-light" scope="col">Number of posts</th>
                                            <th class="border border-light" scope="col">Last post</th>
                                            <th class="border border-light" scope="col">Joined</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th class="border border-light" scope="row"> 
                                                <?php 
                                                echo $id; 
                                                ?>
                                            </th>
                                            <td class="border border-light"><?php printf("%s",$row1[0])?></td>
                                            <td class="border border-light">
                                                <?php printf("%s",$row2[5])?>
                                            </td>
                                            <td class="border border-light">
                                            <?php printf("%s",$row2[7])?>
                                            </td>
                                          </tr>
                                         
                                        </tbody>
                                      </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="usersection container mx-auto border border-dark">
                                <div class="row" style="padding-left:5px;padding-top:5px;padding-bottom:5px">
                                    Description
                                </div>
                                <div class="row-fluid">
                                    <form action="Description.php">
                                    <textarea class="form-control" <?php if($_SESSION['id']!=$id){echo'readonly';}?> rows="3" name ="Description"><?php printf("%s",$row2[10])?></textarea>
                                    <?php if($_SESSION['id']==$id){?>
                                    <button class="btn btn-sm btn-danger btn-block text-uppercase bg-danger w-25 h-25 my-2" type="submit" style="margin-left: 75%">Submit</button> 
                                    <?php } ?>
                                    </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
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