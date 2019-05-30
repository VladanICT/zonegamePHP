<?php
    if(isset($_POST['pill'])){
        include "connection.php";
        $upit = "SELECT * FROM odgovori o, pitanja a WHERE a.aktivna=1 AND a.id_ankete=o.id_ankete";
        $res = $konekcija->prepare($upit);
        if($res->execute()){
            $res = $res->fetchAll();
        
        }
        echo json_encode($res);
    }


?>