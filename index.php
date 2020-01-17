<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Generation du Excel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['numArticle']))
        {
            $_SESSION['numArticle'] = 1;
        }
    ?>
     
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">Génerer une liste : </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Articles <span class="sr-only">(current)</span></a>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">#Catégories</a>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">#Clients</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--   -->
    
    <!--<form action="videSession.php" method="post">
        <input type="submit" value="vider">
    </form> -->
    
    
    <br>
    <div class="container h-100">
		<div class="row h-100 justify-content-center align-items-center">  
        <!-- FORMULAIRE --> 

            <form action="generation.php" method="post">

                <div class="card">
                    <h4 class="card-header">Ajout de l'article
                    <?php 
                        echo $_SESSION['numArticle']; 
                    ?>
                    </h4>
                    <div class="card-body">
                        <div id="groupe-image" class="form-group">
                            <div class="alert alert-secondary" role="alert">
                                Image :
                            <input type="file" class="upld-file" name="img">
                        </div>
                    </div>
                        
                        
                        <div class="input-group mb-3" id="groupe-nom">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
                          </div>
                          <input type="text" class="form-control" name="nom" placeholder="Entrer un nom d'article">
                        </div>
                        
                        <div class="input-group mb-3" id="groupe-nom">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Categorie</span>
                          </div>
                            <select class="form-control" name="categorie">
                                <option value="Hoodies">Hoodies</option>
                                <option value="T-Shirts">T-Shirts</option>
                            </select>
                        </div>
                        
                        
                        <div class="input-group mb-3" id="groupe-nom">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Prix</span>
                          </div>
                          <input type="number" class="form-control" name="prix" min=0.00 max=99999.99 step=0.01 value = 0>
                          <span class="input-group-text">€</span>
                        </div>
                        
                        <div class="input-group mb-3" id="groupe-nom">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Quantité</span>
                          </div>
                          <input type="number" class="form-control" name="quantite" min=0 max=99999 value = 0>
                        </div>
                        
                        <div class="input-group mb-3" id="groupe-nom">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Description </span>
                          </div>
                            <textarea name="description" rows="10" cols="50" placeholder="Description du produit..."></textarea><hr>
                        </div>

                        <input type="submit" class="btn btn-secondary" value="Valider et nouvelle article" name="continuer">
                        <input type="submit" class="btn btn-success" value="Valider et générer la liste" name="generer">
                    </div>
                </div>

            </form>

        <!--            -->
        </div>
    </div>   
</body>
</html>