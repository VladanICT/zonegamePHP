<?php
    
    if(isset($_POST['btnLogin'])){

        $password = $_POST['password'];
        $username = $_POST['email'];

        $errors = [];
        $rePassword = "/^[\S]{5,}$/";
        $reUsername = "/^[\w\d]{6,}$/";

        if(!preg_match($rePassword, $password)){
            $errors[] = "Lozinka nije dobra!";
        }

        if(!preg_match($reUsername, $username)){
            $errors[] = "Korisnicko ime nije dobro!";
        }

        if(count($errors) > 0){
            echo "<ul class='btn btn-danger'>";
            foreach ($errors as $error) {
                echo "<li>".$error."</li>";
            }
            echo "</ul>";
        }
        else {
            require_once "connection.php";

            $pass = md5($password);

            $upit = "SELECT * FROM users u INNER JOIN roles r ON u.id_role = r.id WHERE username = :username AND pass = :pass";

            $login = $konekcija->prepare($upit);
            $login->bindParam(":username", $username);
            $login->bindParam(":pass", $pass);
            $login->execute();
            
            $user = $login->fetch();
            $uloga = $user->id_role;
            if($user){
                if($uloga == 2){
                    $_SESSION['user'] = $user;
                    header("Location: index.php?page=games");
                }
                if($uloga == 1){
                    $_SESSION['admin'] = $user;
                    header("Location: admin.php?page=home");
                }
            }
            else{
                echo "<p class='btn btn-danger error'>Ne postoji takav korisnik!</p>";
                // header("Location: index.php?page=login");
            }
        }
    }