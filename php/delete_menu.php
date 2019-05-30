<?php

    include "connection.php";

    $id = $_GET['value'];

    $query = "DELETE FROM menu WHERE id = :id";

    $result = $konekcija->prepare($query);
    $result->bindParam(":id", $id);
    $result->execute();

    header("Location: admin.php?page=menu");

?>