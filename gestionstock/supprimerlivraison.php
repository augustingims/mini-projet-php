<?php
include 'connect/database.php';
if(isset($_GET['fournisseur'], $_GET['produit'], $_GET['date'])){
    $sql = "DELETE FROM livraison WHERE idproduit=".$_GET['produit']." AND date='".$_GET['date']."' AND idFournisseur=".$_GET['fournisseur'];
    if($conn->query($sql)){
        echo "suppression effectué avec succès";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: livraisons.php");
    die();
}