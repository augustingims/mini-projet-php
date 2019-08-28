<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_PARSE);
include 'connect/database.php';
$sql = "SELECT * FROM fournisseur";
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
                <li class="active" ><a href="fournisseurs.php">Fournisseurs</a></li>
                <li><a href="livraisons.php">Livraisons</a></li>
            </ul>
        </div>
    </nav>
</header>

<section class="container">
    <div class="jumbotron">
        <h1>Fournisseurs</h1>
        <p>Menu de gestion des fournisseurs</p>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="fournisseurs.php">Fournisseurs</a></li>
            <li class="breadcrumb-item active">Liste des fournisseurs</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-3">
            <a href="ajouterfournisseur.php" class="btn btn-primary">Nouveau fournisseur</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Laboratoire</th>
                    <th>Description</th>
                    <th>Telephone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $str = "<tr>";
                                $str .= " <td>" . $row['laboratoire'] . "</td>";
                                $str .= " <td>" . $row['descriptionlab'] . "</td>";
                                $str .= " <td>" . $row['telephone'] . "</td>";
                                $str .= " <td> <a href='editerfournisseur.php?id=".$row['idFournisseur']."' class=\"btn btn-warning\">editer</a>
                            <a href='supprimerfournisseur.php?id=".$row['idFournisseur']."' class=\"btn btn-success\">supprimer</a></td>";
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