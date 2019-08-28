<?php
include 'connect/database.php';
if(isset($_POST['lab'], $_POST['description'], $_POST['telephone'])){
    $sql = "INSERT INTO fournisseur(laboratoire, descriptionlab, telephone) VALUES ('".$_POST['lab']."','".$_POST['description']."','".$_POST['telephone']."')";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement effectué avec succes";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: fournisseurs.php");
    die();
}