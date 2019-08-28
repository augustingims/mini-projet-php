<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect/database.php';
$sql = "SELECT * FROM produit pd INNER JOIN categorie ct WHERE pd. idCategorie = ct.idCategorie";
$result = $conn->query($sql);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="augustin">
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
	                <li class="active"><a href="index.php">Medicament</a></li>
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
	            <li class="breadcrumb-item active">Liste des Medicaments</li>
	        </ol>
	    </nav>
	    <div class="row">
	        <div class="col-md-3">
	            <a href="ajoutermedicament.php" class="btn btn-primary">Nouveau medicament</a>
	        </div>
	    </div>
	    <div class="row">
	        <div class="col-md-12 table-responsive">
	            <table class="table table-striped table-hover">
	                <thead>
	                <tr>
	                    <th>Identifiant</th>
						<th>Nom medicament</th>
	                    <th>Prix</th>
	                    <th>Stock</th>
	                    <th>Famille</th>
	                    <th></th>
	                </tr>
	                </thead>
	                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $str = "<tr>";
							$str .= " <td>" . $row['idproduit'] . "</td>";
							$str .= " <td>" . $row['libele'] . "</td>";
                            $str .= " <td>" . $row['prixunitaire'] . "</td>";
                            $str .= " <td>" . $row['stock'] . "</td>";
                            $str .= " <td>" . $row['libeleCategorie'] . "</td>";
                            $str .= " <td> <a href='editertermedicament.php?id=".$row['idproduit']."' class=\"btn btn-warning\">editer</a>
                        <a href='supprimermedicament.php?id=".$row['idproduit']."' class=\"btn btn-success\">supprimer</a></td>";
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
