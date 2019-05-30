<?php
    @ob_start();
    session_start();
    include "php/connection.php";
    $page = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }

    include "views/front/head.php";
    include "views/front/header.php";

    switch($page){
        case "home":
            include "views/front/home.php";
            break;
        case "about":
            include "views/front/about.php";
            break;
        case "games":
            include "php/games.php";
            include "views/front/games.php";
            break;
        case "gallery":
            include "views/front/gallery.php";
            break;
        case "login":
            include "views/front/login.php";
            break;
        case "register":
            include "views/front/register.php";
            include "php/registracion.php";
            break;
        case "game":
            include "php/game.php";
            include "views/front/game.php";
            break;
        case "logout":
            include "php/logout.php";
            break;
        case "autor":
            include "views/front/autor.php";
            break;
        case "contact":
            include "views/front/contact.php";
            break;
        case "anketa":
            include "views/front/anketa.php";
            break;
        default:
            include "views/front/home.php";
            break;
    }

    include "views/front/footer.php";

?>