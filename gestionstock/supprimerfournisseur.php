<?php
include 'connect/database.php';
if(isset($_GET['id'])){
    $sql = "DELETE FROM fournisseur WHERE idFournisseur=".$_GET['id'];
    if($conn->query($sql)){
        echo "suppression effectué avec succès";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: fournisseurs.php");
    die();
}