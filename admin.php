<!DOCTYPE html>
<html lang="en">
<head>
<title>Game Zone</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
<script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
</head>
<body id="page1">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
            <h1><a href="index.php?page=home"><img src="images/logo.png" class="logo"></a></h1>
        </div>
        <nav>
          <ul class="menu">
            <li><a class="active" href="index.php">Pocetna</a></li>
            <li><a href="admin.php?page=users">Korisnici</a></li>
            <li><a href="admin.php?page=games">Igrice</a></li>
            <li><a href="admin.php?page=gallery">Galerija</a></li>
            <li><a href="admin.php?page=menu">Meni</a></li>
            <li><a href="admin.php?page=anketa">Anketa</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    <?php
                        @ob_start();
                        include "php/connection.php";
                        $page = "";
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }

                        switch($page){
                            case "home":
                                include "views/admin/home.php";
                                break;
                            case "gallery":
                                include "views/admin/gallery.php";
                                break;
                            case "users":
                                include "views/admin/users.php";
                                break;
                            case "games":
                                include "views/admin/games.php";
                                break;
                            case "destinacion":
                                include "views/admin/destinacion.php";
                                break;
                            case "menu":
                                include "views/admin/menu.php";
                                break;
                            case "messages":
                                include "views/admin/messages.php";
                                break;
                            case "anketa":
                                include "views/admin/anketa.php";
                                break;
                            case "deletegame":
                                include "php/delete_game.php";
                                break;
                            case "deletepicture":
                                include "php/delete_picture.php";
                                break;
                            case "deleteusers":
                                include "php/delete_users.php";
                                break;
                            case "deletemenu":
                                include "php/delete_menu.php";
                                break;
                            default:
                                include "views/admin/home.php";
                                break;
                        }
                        
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--==============================footer=================================-->
    <footer>
      <div class="main"> <span>Copyright &copy; <a href="#">Game Zone</a> All Rights Reserved</span> Design by <a target="_blank" href="">Vladan Matorkic</a><span><a href="php1_doc_147_15.pdf">DOCUMENTACIJA</a></span> </div>
    </footer>
  </div>
</div>
</body>
</html>