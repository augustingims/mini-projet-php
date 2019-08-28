<!DOCTYPE html>
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
                <li class="active" ><a href="ajouterfournisseur.php">Fournisseurs</a></li>
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
            <li class="breadcrumb-item"><a href="fournisseurs.php">fournisseurs</a></li>
            <li class="breadcrumb-item active">Ajouter des fournisseurs</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="fournisseurAction.php">
                <div class="form-group row">
                    <label for="lab" class="col-sm-2 col-form-label" >Laboratoire:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lab" name="lab" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label" >Description:</label>
                    <div class="col-sm-10">
                        <textarea rows="3" class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-sm-2 col-form-label">Telephone:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="telephone" name="telephone" required>
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