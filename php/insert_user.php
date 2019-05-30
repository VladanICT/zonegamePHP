<?php

    if(isset($_POST['btnInsert']))
    {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $role = $_POST['role'];

        $errors = [];
        $reNames = "/^[A-Z][a-z]{2,}$/";
        $rePassword = "/^[\S]{5,}$/";
        $reUsername = "/^[\w\d]{6,}$/";
        $reRole = "/^1 || 2$/";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Email nije ok";
        }

        if(!preg_match($rePassword, $password)){
            $errors[] = "Lozinka nije dobra!";
        }

        if(!preg_match($reNames, $firstName)){
            $errors[] = "Ime nije dobro!";
        }

        if(!preg_match($reNames, $lastName)){
            $errors[] = "Prezime nije dobro!";
        }

        if(!preg_match($reUsername, $username)){
            $errors[] = "Korisnicko ime nije dobro!";
        }

        if(!preg_match($reRole, $role)){
            $errors[] = "Uloga nije dobra, mora biti ili 1 ili 2!";
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
            
            $pass = md5($password);
            

            $upit = "INSERT INTO users VALUES('', :firstName, :lastName, :email, :pass, :kor_ime, :role_id)";
            
            $dataPrepare = $konekcija->prepare($upit);
            $dataPrepare->bindParam(":firstName", $firstName);
            $dataPrepare->bindParam(":lastName", $lastName);
            $dataPrepare->bindParam(":email", $email);
            $dataPrepare->bindParam(":pass", $pass);
            $dataPrepare->bindParam(":kor_ime", $username);
            $dataPrepare->bindParam(":role_id", $role);
            $dataPrepare->execute();

            header("Location: ../admin.php?page=users");
        }
    }
?>