<?php

    if(isset($_POST['btnInsert']))
    {
        $title = $_POST['title'];
        $page = $_POST['page'];

        $errors = [];
        $reNames = "/^[A-Z][a-z]{2,}$/";
        $rePage = "/^[a-z]{2,}$/";

        if(!preg_match($reNames, $title)){
            $errors[] = "Naslov nije dobar!";
        }

        if(!preg_match($rePage, $page)){
            $errors[] = "Ime nije dobro!";
        }

        if(count($errors) > 0){
            
            echo "<ul>";

                foreach($errors as $error){
                    echo "<li> $error </li>";
                }
            
            echo "</ul>";
        }
        else {
            require_once "connection.php";
            
            $href = "index.php?page=".$page;

            $upit = "INSERT INTO menu VALUES('', :href, :title)";
            
            $dataPrepare = $konekcija->prepare($upit);
            $dataPrepare->bindParam(":title", $title);
            $dataPrepare->bindParam(":href", $href);
            $dataPrepare->execute();

            header("Location: ../admin.php?page=menu");
        }
    }
?>