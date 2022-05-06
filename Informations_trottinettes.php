<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="shop.css">

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EnDeaVor</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

  </head>


  <body>
	

						<?php
      include("includes/db_connexion.php");
      $r = "SELECT * FROM Catalogue_trottinette WHERE Nom_complet = '".htmlspecialchars($_GET['Nom_complet'])."'";
      $requete = $db->query($r);
      $req = $requete->fetch();

          echo '<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">	
          	<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="Back-Office/uploads/trottinette/'.$req["image1"].'" />
						  </div>					  
						</div>
						</div>
					<div class="details col-md-6">
						<h3 class="product-title">'.$req["Nom_complet"].'</h3><br>
						<div class="rating">
							<span class="review-no" style="color: white; font-size: 20px;">52: vues</span>
							<span class="review-no" style="color: white; font-size: 20px; float: right;">Quantités : '.$req["stock"].'</span>
						</div>
						<br><br>
						<label class="product-description">Description :</label>
						<p class="product-description">'.$req["description"].'</label></p>
						<h4 class="price">Prix: <span>'.$req["prix"].'€</span></h4>
						<div class="action">
							<a href="index.php">	<button class="add-to-cart btn btn-default" type="button" style="float: left;">Acceuil</button></a>
						
							<button class="add-to-cart btn btn-default" type="button">Ajouter au panier</button>
						</div>
					</div>
							</div>
			</div>
		</div>
	</div>
  ';




    ?>
				
</body>

			
</html>
