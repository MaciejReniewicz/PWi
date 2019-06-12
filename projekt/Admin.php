
<?php

session_start();

require_once "connect.php";
if(!isset($_SESSION['moderator'])||$_SESSION['moderator']!=1){
header("Location:Project.php");
}

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
echo "Error: ".$polaczenie->connect_errno;
}
else
{

    $rezultat1 = @$polaczenie->query("SELECT * FROM post order by created desc");

    $rezultat2 = @$polaczenie->query("SELECT * FROM thread order by last_post desc");
       
    $rezultat3 = @$polaczenie->query("SELECT * FROM user order by created desc");
    
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
  <title>Admin</title>
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
          ?>
        </ul>

      </div>
    </nav>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb border border-light">
        <li class="breadcrumb-item"><a href="Project.php">Project</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
      </ol>
    </nav>


    <div class="container-fluid">
      <div class="row">
        <div class="col-3 bg-danger" style="padding:20px;padding-bottom:500px;">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
              aria-controls="v-pills-home" aria-selected="true">Users</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
              aria-controls="v-pills-profile" aria-selected="false">Threads</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
              aria-controls="v-pills-messages" aria-selected="false">Posts</a>
          </div>
        </div>
        <div class="col-9 panel bg-danger">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <h5>Users</h5>
              <table class="table bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nick</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is moderator</th>
                    <th scope="col">Is active</th>
                    <th scope="col">Moderator?</th>
                    <th scope="col">Banned?</th>
                  </tr>
                </thead>
                <?php while($row3=$rezultat3->fetch_row()){ ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php printf("%s", $row3[0]);?></th>
                    <td><?php printf("%s", $row3[1]);?></td>
                    <td><?php printf("%s", $row3[3]);?></td>
                    <td><?php printf("%s", $row3[8]);?></td>
                    <td><?php printf("%s", $row3[9]);?></td>
                    <td> <a href="UpdateMod.php?id=<?php printf("%s", $row3[0]);?>&is_moderator=1">Mod</a> / <a href="UpdateMod.php?id=<?php printf("%s", $row3[0]);?>&is_moderator=0">UnMod</a></td>
                    <td> <a href="Ban.php?id=<?php printf("%s", $row3[0]);?>&is_active=0">Ban</a> / <a href="Ban.php?id=<?php printf("%s", $row3[0]);?>&is_active=1">Unban</a></td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <h5>Threads</h5>
              <table class="table bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Subsection</th>
                    <th scope="col">Is_active</th>
                    <th scope="col">Is_sticky</th>
                    <th scope="col">Archivize?</th>
                    <th scope="col">Sticky?</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <?php while($row2=$rezultat2->fetch_row()){ ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php printf("%s", $row2[0]);?></th>
                    <td><?php printf("%s", $row2[1]);?></td>
                    <td><?php printf("%s", $row2[3]);?></td>
                    <td><?php printf("%s", $row2[5]);?></td>
                    <td><?php printf("%s", $row2[6]);?></td>
                    <td> <a href="Archive.php?id=<?php printf("%s", $row2[0]);?>&is_active=0" >Archive</a> / <a href="Archive.php?id=<?php printf("%s", $row2[0]);?>&is_active=1" >UnArchive</a></td>
                    <td> <a href="UpdateSticky.php?id=<?php printf("%s", $row2[0]);?>&is_sticky=1">Yes</a> / <a href="UpdateSticky.php?id=<?php printf("%s", $row2[0]);?>&is_sticky=0">No</a><?php?></td>
                    <td> <a href="DeleteThread.php?id=<?php printf("%s", $row2[0]);?>">Delete</a> </td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <h5>Posts</h5>
              <table class="table bg-light">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Content</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Thread ID</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <?php while($row1=$rezultat1->fetch_row()){ ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php printf("%s", $row1[0]);?></th>
                    <td><?php $string = substr($row1[1],0,25); echo $string;?></td>
                    <td><?php printf("%s", $row1[3]);?></td>
                    <td><?php printf("%s", $row1[4]);?></td>
                    <td> <a href="DeletePost.php?id=<?php printf("%s", $row1[0]);?>">Delete Post</a><?php?></td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
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