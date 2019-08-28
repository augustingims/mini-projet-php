<?php
include 'connect/database.php';
if(isset($_POST['identifiant'], $_POST['medicament'], $_POST['prix'], $_POST['stock'], $_POST['categorie'])){
    $sql = "INSERT INTO produit(idProduit, libele, prixunitaire, stock, idCategorie) VALUES (".$_POST['identifiant'].",'".$_POST['medicament']."',".$_POST['prix'].",".$_POST['stock'].",".$_POST['categorie'].")";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ./");
    die();
}