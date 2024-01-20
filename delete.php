<?php

require 'config.php';

if(isset($_GET['dlt_id'])){

    $dlt = $_GET['dlt_id'];

    $sql = $conn->prepare('DELETE FROM todo WHERE id = :id');
    $sql->bindParam(':id', $dlt);
    $sql->execute();
    $msg = "<div class='alert alert-danger'>Id No: $dlt Deleted</div>";

    header("Location: index.php");

}

?>