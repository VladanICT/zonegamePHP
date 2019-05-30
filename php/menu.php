<?php

    include "connection.php";

    $query = "SELECT * FROM menu";

    $result = $konekcija->prepare($query);
        
    if($result->execute()){
        $result = $result->fetchAll();
    }

?>