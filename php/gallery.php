<?php
                    
    $query = "SELECT * FROM gallery";

    $result = $konekcija->prepare($query);
    if($result->execute()){
        $result = $result->fetchAll();
    }
    
?>