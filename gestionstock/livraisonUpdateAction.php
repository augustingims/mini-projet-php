<?php
include 'connect/database.php';
if(isset($_POST['fournisseur'], $_POST['medicament'], $_POST['date'], $_POST['quant'])){
    $sql = "UPDATE livraison SET quant=".$_POST['quant']." WHERE idproduit=".$_POST['medicament']." AND date='".$_POST['date']."' AND idFournisseur=".$_POST['fournisseur'];
    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   $conn->close();
   header("Location: livraisons.php");
   die();
}else{
    echo  "veillez remplir tous les champs du formulaire";
}