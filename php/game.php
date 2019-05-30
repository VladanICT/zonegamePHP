<?php

    include "connection.php";

    $id = $_GET['value'];

    $query = "SELECT * FROM games WHERE id = :id";

    $result = $konekcija->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();
    $game = $result->fetch();

?>