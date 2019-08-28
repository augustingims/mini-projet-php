<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect/database.php';
$sql = "SELECT * FROM categorie";
$result = $conn->query($sql);
if(isset($_GET['id'])){
    $sql1 = "SELECT * from produit WHERE idproduit=".$_GET['id']." LIMIT 1";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    if(sizeof($row1)==0){
        header("Location: ./");
        die();
    }
}

?>
<head>
    <meta charset="UTF-8">
    <title>Gestion stock</title>
    <link rel="stylesheet" href="css/main.css" >
</head>
<body>
<header>
    <div class="row">
        <div class="col-md-3 logo"></div>
        <div class="col-md-9 medicament"></div>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Gestion du Stock et de ces fournisseurs</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="ajoutermedicament.php">Medicament</a></li>
                <li><a href="fournisseurs.php">Fournisseurs</a></li>
                <li><a href="livraisons.php">Livraisons</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="container">
    <div class="jumbotron">
        <h1>Medicaments</h1>
        <p>Menu de gestion des medicaments</p>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Medicaments</a></li>
            <li class="breadcrumb-item active">Modifier un Medicament</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="medicamentUpdateAction.php" name="medicamentForm">
                <div class="form-group row">
                    <label for="identifiant" class="col-sm-2 col-form-label" >Identifiant:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="identifiant" value= <?php echo " '".$row1['idproduit']."'"; ?> name="identifiant" disabled required>
                        <input type="hidden" class="form-control" id="identifiant" value= <?php echo " '".$row1['idproduit']."'"; ?> name="identifiant">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="medicament" class="col-sm-2 col-form-label" >Nom medicament:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="medicament" value= <?php echo " '".$row1['libele']."'"; ?> name="medicament" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prix" class="col-sm-2 col-form-label">Prix:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="prix" value= <?php echo " '".$row1['prixunitaire']."'"; ?>  name="prix" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="stock" value= <?php echo " '".$row1['stock']."'"; ?>  name="stock" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sel1" class="col-sm-2 col-form-label">Famille : </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sel1" name="categorie" required>
                            <option value=""> Selectionner la famille</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if($row['idCategorie'] == $row1['idCategorie']){
                                        $str = "<option value='".$row['idCategorie']."' selected>".$row['libeleCategorie']."</option>";
                                    }else{
                                        $str = "<option value='".$row['idCategorie']."'>".$row['libeleCategorie']."</option>";
                                    }
                                    echo $str;
                                }

                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div style="height: 20px;"></div>
</section>
</body>
</html>