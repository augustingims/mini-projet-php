<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect/database.php';
$sql = "SELECT p.libele AS libele, f.laboratoire AS laboratoire, l.date AS date, l.quant AS quant, l.idproduit AS idproduit, l.idFournisseur AS idFournisseur FROM livraison l, produit p, fournisseur f WHERE l.idproduit=p.idproduit AND l.idFournisseur=f.idFournisseur";
$result = $conn->query($sql);
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
            <li class="breadcrumb-item active">Liste des Livraisons</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3">
            <a href="ajouterlivraison.php" class="btn btn-primary">Nouveau Livraison</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Laboratoire</th>
                    <th>Nom medicament</th>
                    <th>Date</th>
                    <th>Quantite</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $str = "<tr>";
                                $str .= " <td>" . $row['laboratoire'] . "</td>";
                                $str .= " <td>" . $row['libele'] . "</td>";
                                $str .= " <td>" . $row['date'] . "</td>";
                                $str .= " <td>" . $row['quant'] . "</td>";
                                $str .= " <td> <a href='editerlivraison.php?fournisseur=".$row['idFournisseur']."&produit=".$row['idproduit']."&date=".$row['date']."' class=\"btn btn-warning\">editer</a>
                            <a href='supprimerlivraison.php?fournisseur=".$row['idFournisseur']."&produit=".$row['idproduit']."&date=".$row['date']."' class=\"btn btn-success\">supprimer</a></td>";
                                $str .= "</tr>";
                                echo $str;
                            }

                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div style="height: 20px;"></div>
</section>

</body>
</html>