<?php

    if(isset($_POST['btnInsert'])){

        $title = $_POST['title'];
        $price = $_POST['price'];
        $about = $_POST['description'];
        $picture = $_FILES['picture'];
        $cover = $_FILES['cover'];

        //var_dump($picture);
        $file_name = $picture['name'];
        $file_type = $picture['type'];
        $file_size = $picture['size'];
        $file_tmp = $picture['tmp_name'];

        $file_name_cover = $cover['name'];
        $file_type_cover = $cover['type'];
        $file_size_cover = $cover['size'];
        $file_tmp_cover = $cover['tmp_name'];

        $errors = [];
        $reTitle = "/^[\w\d\s]{2,}$/";
        $rePrice = "/^[\d]{1,10000}$/";
        $reAbout = "/^[\s\S]{120,}$/";

        if(!preg_match($reTitle, $title)){
            $errors[] = "Naslov mora sadrzati samo slova i brojeve. I ne sme imati manje od 2 karaktera. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($rePrice, $price)){
            $errors[] = "Cena nije ispravna. Vratite se i pokusajte ponovo.";
        }

        if(!preg_match($reAbout, $about)){
            $errors[] = "Opis nije dobar. Opis treba imati vise od 120 karaktera. Vratite se i pokusajte ponovo.";
        }

        $formats = array("image/jpg", "image/jpeg", "image/png", "image/gif");

        if(!in_array($file_type, $formats)){
            $errors[] = "Tip profilne slike nije dobar.";
        }

        if($file_size > 10000000){
            $errors[] = "Profilna slika mora biti manja od 10MB.";
        }

        if(!in_array($file_type_cover, $formats)){
            $errors[] = "Tip naslovne slike nije dobar.";
        }

        if($file_size_cover > 10000000){
            $errors[] = "Naslovna slika mora biti manja od 10MB.";
        }

        if(count($errors) > 0){
            echo "<ul>";

                foreach($errors as $error){
                    echo "<li> $error </li>";
                }
            
            echo "</ul>";
        }
        else {

            $file_name = time()."_".$file_name;
            $new_src = "../images/games/".$file_name;
            $new_src_picture = "images/games/".$file_name;

            $file_name_cover = time()."_".$file_name_cover;
            $new_src_cover = "../images/games/cover/".$file_name_cover;
            $new_src_picture_cover = "images/games/cover/".$file_name_cover;

            if(move_uploaded_file($file_tmp, $new_src) && move_uploaded_file($file_tmp_cover, $new_src_cover)){
                
                require_once "connection.php";

                $upit = "INSERT INTO games VALUES('', :title, :about, :price, :profil, :cover)";
                
                $dataPrepare = $konekcija->prepare($upit);
                $dataPrepare->bindParam(":title", $title);
                $dataPrepare->bindParam(":profil", $new_src_picture);
                $dataPrepare->bindParam(":price", $price);
                $dataPrepare->bindParam(":about", $about);
                $dataPrepare->bindParam(":cover", $new_src_picture_cover);

                $dataPrepare->execute();

                header("Location: ../admin.php?page=games");
            }
        }
    }