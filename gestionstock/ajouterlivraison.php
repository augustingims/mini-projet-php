<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect/database.php';
$fournisseurSql = "SELECT * FROM fournisseur";
$fournisseur = $conn->query($fournisseurSql);

$produitSql = "SELECT * FROM produit";
$produit = $conn->query($produitSql);

?>
<html lang="en">
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
                <li><a href="index.php">Medicament</a></li>
                <li><a href="fournisseurs.php">Fournisseurs</a></li>
                <li class="active"><a href="livraisons.php">Livraisons</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="container">
    <div class="jumbotron">
        <h1>Livraisons</h1>
        <p>Menu de gestion des Livraisons</p>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="livraisons.php">Livraisons</a></li>
            <li class="breadcrumb-item active">Ajouter des Livraisons</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="livraisonAction.php">
                <div class="form-group row">
                    <label for="fournisseur" class="col-sm-2 col-form-label">Fournisseur : </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="fournisseur" name="fournisseur" required>
                            <option value=""> Selectionner le fournisseur</option>
                            <?php
                            if ($fournisseur->num_rows > 0) {
                                while ($row = $fournisseur->fetch_assoc()) {
                                    $str = "<option value='".$row['idFournisseur']."'>".$row['laboratoire']."</option>";
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
                <div class="form-group row">
                    <label for="medicament" class="col-sm-2 col-form-label">Medicament : </label>
                    <div class="col-sm-10">
                        <select class="form-control" id="medicament" name="medicament" required>
                        <option value=""> Selectionner le medicament</option>
                            <?php
                            if ($produit->num_rows > 0) {
                                while ($row = $produit->fetch_assoc()) {
                                    $str = "<option value='".$row['idproduit']."'>".$row['libele']."</option>";
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
                <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">Date :</label>
                    <div class="col-sm-10">
                        <input type="date"  id="date" name="date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-sm-2 col-form-label">Quantite :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quant" name="quant" required>
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