<?php

    if(isset($_POST['btnRegister']))
    {
        echo "korak 1";
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        $errors = [];
        $reNames = "/^[A-Z][a-z]{2,}$/";
        $rePassword = "/^[\S]{5,}$/";
        $reUsername = "/^[\w\d]{6,}$/";

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

        if(count($errors) > 0){
            $_SESSION['greske'] = $errors;
            echo "korak 2";
            header("Location: index.php?page=games");
        }
        else {
            require_once "connection.php";
            echo "korak 3";
            $pass = md5($password);
            $role = 2;

            $upit = "INSERT INTO users VALUES('', :firstName, :lastName, :email, :pass, :kor_ime, :role_id)";
            echo "korak 4";
            $dataPrepare = $konekcija->prepare($upit);
            $dataPrepare->bindParam(":firstName", $firstName);
            $dataPrepare->bindParam(":lastName", $lastName);
            $dataPrepare->bindParam(":email", $email);
            $dataPrepare->bindParam(":pass", $pass);
            $dataPrepare->bindParam(":kor_ime", $username);
            $dataPrepare->bindParam(":role_id", $role);
            $dataPrepare->execute();
            echo "korak 5";
            header("Location: index.php?page=game");
        }
    }
?>