<?php

    session_start();
    $nazwa_podrozdzialu = $_GET['nazwa_podrozdzialu'];
    $nazwa_watku = $_GET['nazwa_watku'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <title>Post</title>

</head>

<body>
    <div class="mainbody container-fluid">
        <nav class="navbar fixed-top navbar-expand-md border border-light">
            <a class="navbar-brand" href="Project.php"><img src="logo.jpg" 
                    class="d-inline-block mr-1 align-bottom" alt=""> For the Horde</a>

            <button class="navbar-toggler bg-danger" type="button" data-toggle="collapse" data-target="#mainmenu"
                aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="mainmenu">

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
                <li class="breadcrumb-item"><a href="Project.php">Project</a></li>
                <li class="breadcrumb-item"><a href="subsection.php?nazwa_podrozdzialu=<?=$nazwa_podrozdzialu?>"><?=$nazwa_podrozdzialu?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$nazwa_watku?></li>
            </ol>
        </nav>

        <div class="main col-sm-12 col-md-10 offset-sm-0 offset-md-1 border border-light mb-1"
            style="padding-bottom:10px;">
            <div class="area">
                <div id="subjectrow" class="row-fluid">
                    <p id="p">Subject</p>
                </div>
                <div class="thread row">
                    <div class="col-2 mx-auto">
                        <a href="User.php">
                            <div class="postuser row-fluid mx-auto">
                                <figure>
                                    <img src="GDiscussion.jpg" class="figureimg border border-dark" alt="">
                                </figure>
                            </div>
                            <div class="postuser row-fluid mx-auto">
                                Username
                            </div>
                        </a>
                    </div>
                    <div class="col-10">
                        Lorem ipsum dolor sit amet, possit dolorum cum ne. Nec explicari consulatu no, eu vel etiam
                        volumus quaerendum. Cum utamur aliquam eu. Verear minimum per at, no eam summo torquatos
                        voluptaria. An mel diceret adversarium. Vix accusam menandri contentiones ei, ex animal nostrum
                        lucilius qui.
                        Sed ea dolorem gubergren, augue malorum definiebas vis ei. Qui te expetenda rationibus. Ex quo
                        latine gloriatur. Sea ne facilisis interesset, pri choro eligendi cu. Nulla tritani postulant
                        usu ex, in utamur nominati interpretaris eum, ius ea fierent eleifend.
                        Te sed novum nihil congue. Primis appetere duo cu, vim ridens voluptaria an. Has id adolescens
                        mnesarchum,
                        sit te ocurreret principes, eos ea everti detraxit. An aliquip urbanitas voluptatum eum, prompta
                        atomorum
                        accusamus sed ei. Ne pro falli tibique, et vix scripta intellegam, his id alterum omnesque
                        maluisset.
                        Et augue corpora patrioque quo.
                        Id facete adipiscing conclusionemque duo, nominavi persecuti an cum. Omnesque molestie
                        reformidans ei eam.
                        Duis augue duo ut, ut vel ullum summo omnes, ea vis bonorum oportere. Cu mei nibh omnes ornatus,
                        ex libris
                        gubergren nec. Graeco dicunt accusam eum ea, ne atqui etiam eloquentiam qui. Usu ferri repudiare
                        at.
                        Nisl eius gloriatur mea ei, an nostro omnesque invenire ius. Ut malis adolescens scripserit eum.
                        Ex inermis
                        senserit instructior has, ex eos reque inani debitis, ius ad utamur tamquam. Vim no nulla
                        definiebas.
                        Et eum saepe blandit temporibus. Eos vero fabulas cu, an vidit placerat pertinacia mea, nam
                        inani mundi cu.
                        Te duo error fabulas tibique, pri ex eros lorem invidunt. Sit novum volutpat an, vel eu nibh
                        munere.
                        Has alia mutat putant ne, sed viris efficiendi eloquentiam at. Ne sed quem blandit, est id dicam
                        indoctum,
                        nam accusamus mnesarchum ei.
                    </div>
                </div>
            </div>
        </div>

        <div class="main col-sm-12 col-md-10 offset-sm-0 offset-md-1 border border-light mb-1">
            <div class="area">
                <div class="thread row">
                    <div class="col-2">
                        <a href="User.php">
                            <div class="postuser row-fluid mx-auto">
                                <figure>
                                    <img src="GDiscussion.jpg" class="figureimg border border-dark" alt="">
                                </figure>
                            </div>
                            <div class="postuser row-fluid mx-auto">
                                Username
                            </div>
                        </a>
                    </div>
                    <div class="col-10">
                        Lorem ipsum dolor sit amet, possit dolorum cum ne. Nec explicari consulatu no, eu vel etiam
                        volumus quaerendum. Cum utamur aliquam eu. Verear minimum per at, no eam summo torquatos
                        voluptaria. An mel diceret adversarium. Vix accusam menandri contentiones ei, ex animal nostrum
                        lucilius qui.
                        Sed ea dolorem gubergren, augue malorum definiebas vis ei. Qui te expetenda rationibus. Ex quo
                        latine gloriatur. Sea ne facilisis interesset, pri choro eligendi cu. Nulla tritani postulant
                        usu ex, in utamur nominati interpretaris eum, ius ea fierent eleifend.
                    </div>
                </div>

            </div>
        </div>

       x
        <div class="main col-sm-12 col-md-10 offset-sm-0 offset-md-1 border border-light mb-5 pb-0 mt-5 bg-dark">
        <form action="CreatePost.php?nazwa=<?=$_GET['nazwa_posta']?>" method="post">
            <div class="area">
                <div class="thread row">
                    <div class="col-2">
                        <a href="User.php">
                            <div class="postuser row-fluid mx-auto">
                                <figure>
                                    <img src="GDiscussion.jpg" class="figureimg border border-dark" alt="">
                                </figure>
                            </div>
                            <div class="postuser row-fluid mx-auto">
                                You
                            </div>
                        </a>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group textarea rounded-corners">
                            <textarea class="form-control" id="exampleFormControlTextarea345" rows="3" placeholder="Write your comment..." name ="comments"></textarea>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="col-12 my-2 px-0">
                    <input type="submit" class="border border-danger" value="Reply" style="position: absolute;right:10px;bottom:0"/>
                </div>
            </div>
        </div>
    </form>


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