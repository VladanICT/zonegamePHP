<?php 
    if(isset($_POST['fill'])){
        include "connection.php";
        $query = "SELECT id_ankete, pitanje FROM pitanja WHERE aktivna=1";

        $result = $konekcija->prepare($query);
        if($result->execute()){
            $result = $result->fetchAll();
        }

        echo json_encode($result);

    }
?>