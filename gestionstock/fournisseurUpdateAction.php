<?php
include 'connect/database.php';
if(isset($_POST['lab'], $_POST['description'], $_POST['telephone'])){
    $sql = "UPDATE fournisseur 
        SET laboratoire='".$_POST['lab']."', descriptionlab='".$_POST['description']."', telephone='".$_POST['telephone']."' WHERE idFournisseur=".$_POST['idFournisseur'];

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
   header("Location: fournisseurs.php");
   die();
}else{
    echo  "veillez remplir tous les champs du formulaire";
}