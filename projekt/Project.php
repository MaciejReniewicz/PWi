<?php

    session_start();	
    $id = $_SESSION['id'];
	//Usuwanie zmiennych pamiętających wartości wpisane do formularza
	if (isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
	if (isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
	if (isset($_SESSION['fr_haslo1'])) unset($_SESSION['fr_haslo1']);
	if (isset($_SESSION['fr_haslo2'])) unset($_SESSION['fr_haslo2']);
	if (isset($_SESSION['fr_regulamin'])) unset($_SESSION['fr_regulamin']);
	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
    
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title>Project</title>

</head>

<body>
    <div class="mainbody container-fluid">
        <nav class="navbar fixed-top navbar-expand-md border border-light">
            <a class="navbar-brand" href="Project.php"><img src="logo.jpg" class="d-inline-block mr-1 align-bottom"
                    alt=""> For the Horde</a>

            <button class="navbar-toggler bg-danger" type="button" data-toggle="collapse" data-target="#mainmenu"
                aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="mainmenu">

                <ul class="navbar-nav">
                <?php
                    if(isset($_SESSION['blad'])){
                        echo '<li class="nav-item" style="align-self: auto; padding-right: 500px">';
                        echo $_SESSION['blad'];
                        echo '</li>';
                    }
                    if(isset($_SESSION['moderator'])&&$_SESSION['moderator']==1){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="admin.php">' ;
                        echo'Admin Panel' ;
                        echo'</a>';
                        echo'</li>';
                    }
                    if(isset($_SESSION['udanarejestracja'])){
                        echo '<li class="nav-item" style="align-self: auto; padding-right: 500px">';
                        echo "Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!";
                        echo '</li>';
                        unset($_SESSION['udanarejestracja']); 
                    }   
                    
                    if (!isset($_SESSION['zalogowany'])){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="login.php">' ;
                        echo'Login' ;
                        echo'</a>';
                        echo'</li>';
                    }
                    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
                        echo'<li class="nav-item" style="align-self: flex-end">';
                        echo'<a class="nav-link align-right" href="User.php?id='.$id.'">';
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
                <li class="breadcrumb-item active" aria-current="page" style="font-size: 20px;">Project</li>
            </ol>
        </nav>
        <div class="main col-sm-12 col-md-10 offset-sm-0 offset-md-1 border border-light mb-5">

            <section class="section container mx-auto border border-dark">
                Community
                <div class="mainrow row">
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=General Discussion">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/GDiscussion.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>General Discussion</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Discuss World of Warcraft.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=Lore">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Lore.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Lore</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Discuss World of Warcraft Universe storylines here.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mainrow row">
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=GuildRecruitment">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Recruitment.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Guild Recruitment</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Searching for a guild? Want to advertise yours?
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=Tavern">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Tavern.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Tavern</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Share your adventures and fanfiction here.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>


            <section class="section container mx-auto border border-dark">
                Gameplay & Guides
                <div class="mainrow row">
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=New Player Zone">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/NewPlayerZone.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>New player zone</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Question and Answers in order to help new players get into the game.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=Professions">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Professions.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Professions</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Discussion forum for World of Warcraft Professions.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mainrow row">
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=Achievements">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Achievements.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Achievements</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Discuss World of Warcraft in-game achievements here.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="subsection col-sm-12 col-md-6">
                        <a href="subsection.php?nazwa_podrozdzialu=Classes">
                            <div class="block row border border-light">
                                <div class="figure col-3">
                                    <img src="avatars/Classes.jpg" class="figureimg border border-dark" alt="">
                                </div>
                                <div class="blocksection col-9">
                                    <div class="row">
                                        <div class="chapter col-12">
                                            <h5>Classes</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <aside class="col-12">
                                            Share your thoughts about World of Warcraft classes here.
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <footer id="footer" class=" col-12 border border-light">
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