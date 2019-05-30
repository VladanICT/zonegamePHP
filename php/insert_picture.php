<?php

    if(isset($_POST['btnInsert'])){

        $title = $_POST['tbTitle'];
        $picture = $_FILES['picture'];

        //var_dump($picture);
        $file_name = $picture['name'];
        $file_type = $picture['type'];
        $file_size = $picture['size'];
        $file_tmp = $picture['tmp_name'];

        $errors = [];
        $reTitle = "/^[\w\d\s]{2,}$/";

        if(!preg_match($reTitle, $title)){
            $errors[] = "Naslov mora sadrzati samo slova i brojeve. Vratite se i pokusajte ponovo.";
        }

        $formats = array("image/jpg", "image/jpeg", "image/png", "image/gif");

        if(!in_array($file_type, $formats)){
            $errors[] = "Tip fajla nije dobar.";
        }

        if($file_size > 10000000){
            $errors[] = "Fajl mora biti manji od 10MB.";
        }

        if(count($errors) > 0){
            // $_SESSION['greske'] = $errors;
            //header("Location: ../admin.php?page=gallery");
            echo "<ul>";

                foreach($errors as $error){
                    echo "<li> $error </li>";
                }
            
            echo "</ul>";
        }
        else {

            $file_name = time()."_".$file_name;
            $new_src = "../images/gallery/".$file_name;
            $new_src_picture = "images/gallery/".$file_name;

            if(move_uploaded_file($file_tmp, $new_src)){
                
                require_once "connection.php";

                $upit = "INSERT INTO gallery VALUES('', :src, :title)";
                
                $dataPrepare = $konekcija->prepare($upit);
                $dataPrepare->bindParam(":title", $title);
                $dataPrepare->bindParam(":src", $new_src_picture);

                $dataPrepare->execute();

                header("Location: ../admin.php?page=gallery");
            }
        }
    }