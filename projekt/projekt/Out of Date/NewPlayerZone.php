<?php

    session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title>New Player Zone</title>

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
                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px">NewPlayerZone</li>
            </ol>
        </nav>

        <div class="main col-sm-12 col-md-8 col-xl-10 offset-sm-0 offset-md-2 offset-xl-1 border border-light mb-5">
            <div class="area container mx-auto">
                Sticky Threads
                <a href="Post.php">
                    <div class="mainrow row border border-light">
                        <div class="col-6">
                            <div class="row">
                                <div class="subject col-12">
                                    <p class="p">Subject</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="comments row">
                                <p class="p">Number</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row originalposter">
                                <p class="p">Poster</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="row date">
                                <p class="p">Date</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="area container mx-auto">
                New Player Zone
                <div class="col-12 my-2 px-0">
                    <a href="NewPost.php">
                        <button type="button" class="btnSubmit bg-danger" style="border-radius: 10px">New Post</button>
                    </a>
                </div>
                <a href="Post.php">
                    <div class="mainrow row border border-light">
                        <div class="col-6">
                            <div class="row">
                                <div class="subject col-12">
                                    <p class="p">Subject</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="comments row">
                                <p class="p">Number</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="originalposter row">
                                <p class="p">Poster</p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="date row">
                                <p class="p">Date</p>
                            </div>
                        </div>
                    </div>
                </a>
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