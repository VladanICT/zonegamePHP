<?php

    include "connection.php";

    $query = "SELECT * FROM games";

    $result = $konekcija->prepare($query);
        
    if($result->execute()){
        $result = $result->fetchAll();
    }

?>