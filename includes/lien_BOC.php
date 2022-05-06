
   								<?php


      include("db_connexion.php");
   $r = "SELECT * FROM admin WHERE email = '".htmlspecialchars($_SESSION['email'])."'";
      $requete = $db->query($r);
      $req = $requete->fetch();
         echo'<ul class="navbar-nav ml-auto">
		      <li class="nav-item dropdown ets-right-0">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        <img src="../Back-Office/uploads/ajout_admin/'.$req["image"].'" class="img-fluid rounded-circle border user-profile">
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
		          <a class="dropdown-item" href="Messagerie.php">Messagerie</a>
		          <a class="dropdown-item" href="../deconnexion.php">Deconnexion</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="ajout_admin.php">Ajout d\'un administrateur</a>
		        </div>
		      </li>
		    </ul>
		</nav>
	  
		<div class="side-bar">
	  		<div class="side-bar-links">
	  			<div class="side-bar-logo text-center py-3">
 
	  <img src="../Back-Office/uploads/ajout_admin/'.$req["image"].'" class="img-fluid rounded-circle border bg-secoundry mb-3">
	  				<h5>Admin :</h5><h5>'.$req["nom"].'</h5>
	  			</div>
 				
	  			<ul class="navbar-nav">
	  			<li class="nav-item">
	  					<a href="../index.php" class="nav-links d-block"><i class="fa fa-spin fa-cog"></i> Acceuil</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="add_items.php" class="nav-links d-block"><i class="fa fa-spin fa-cog"></i> Ajout d\'un item</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="add_informations.php" class="nav-links d-block"><i class="fa fa-spin fa-cog"></i> Ajout d\'une information</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="add_forfaits.php" class="nav-links d-block"><i class="fa fa-spin fa-cog"></i> Ajout d\'un forfait</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="add_trottinette.php" class="nav-links d-block"><i class="fa fa-spin fa-cog"></i> Ajout d\'une trottinette</a>
	  				</li>
	  			</ul>
	  		</div>
	  		<div class="side-bar-icons">
	  			
	  			<div class="icons d-flex flex-column align-items-center">
	  				<a href="Back-Office_index.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-address-book"></i></a>
	  				<a href="infos-article.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-shopping-bag"></i></a>
	  				<a href="infos-acceuil.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
	  				<a href="infos-trottinettes.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-database"></i></a>
	  				<a href="infos-forfaits.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-adjust"></i></a>
	  				<a href="Back-Office-Infos-Admin.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-gavel"></i></a>
	  			<a href="Back-Office-postion.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-map-marker"></i></a>
	  			
	  			</div>
	  		</div>
	  		</div>';
	  		?>
