<?php
include 'connect/database.php';
print_r($_POST);
if(isset($_POST['identifiant'], $_POST['medicament'], $_POST['prix'], $_POST['stock'], $_POST['categorie'])){
    $sql = "UPDATE produit 
        SET libele='".$_POST['medicament']."', prixunitaire=".$_POST['prix'].", stock=".$_POST['stock']
        .", idCategorie=".$_POST['categorie']." WHERE idproduit=".$_POST['identifiant'];

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
   header("Location: ./");
   die();
}else{
    echo  "veillez remplir tous les champs du formulaire";
}