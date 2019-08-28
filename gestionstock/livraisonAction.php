<?php
include 'connect/database.php';
if(isset($_POST['fournisseur'], $_POST['medicament'], $_POST['date'], $_POST['quant'])){
    $sql = "INSERT INTO livraison(idFournisseur, idproduit, date, quant) VALUES (".$_POST['fournisseur'].",".$_POST['medicament'].",'".$_POST['date']."',".$_POST['quant'].")";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: livraisons.php");
    die();
}