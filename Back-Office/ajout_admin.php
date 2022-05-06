<!-- 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
<?php
session_start();
 include("../includes/header.php"); 
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Infantry</title>
  </head>
  <style type="text/css">
  	.navbar.bg-light{
  		background-color: #4682B4 !important;
  		transition: ease 0.5s;
  	}
  	.user-profile{
  		width: 50px;
  		height: 50px;
  		background-color: #f1f1f1;
  	}
  	.navbar .menu-bar{
  		display: inline-block;
  		width: 50px;
  		height: 50px;
  		margin-right: 10px;
  		position: relative;
  		cursor: pointer;
  	}
  	.navbar .menu-bar .bars{
  		position: relative;
  		top:50%;
  		width:30px;
  		height: 2px;
  		background-color: #fff;
  	}
  	.navbar .menu-bar .bars::after{
  		content: "";
  		position: absolute;
  		bottom: -8px;
  		width: 100%;
  		height: 2px;
  		background-color: #fff;
  	}
  	.navbar .menu-bar .bars::before{
  		content: "";
  		position: absolute;
  		top:-8px;
  		width: 100%;
  		height: 2px;
  		background-color: #fff;
  	}
  	.navbar ul.navbar-nav li.nav-item.ets-right-0 .dropdown-menu{
  		left: auto;
  		right: 0;
  		position: absolute;
  	} 
  	.side-bar{
  		position: fixed;
	  	top:81px;
  		left:0;
  		padding: 15px;
  		display: inline-block;
  		width: 100px;
  		background-color: #fff;
  		box-shadow: 0px 0px 8px #ccc;
  		height: 100vh;
  		transition: ease 0.5s; 
  		overflow-y: auto;
  	}
  	.main-body-content{
  		display: inline-block;
  		padding: 15px;
  		background-color:#eef4fb;
  		height: 100vh;
  		padding-left: 100px;
  		transition: ease 0.5s; 
  	}
  	.ets-pt{
  		padding-top: 100px;
  	}
  	.main-admin.show-menu .side-bar{
  		width: 250px;
  	}

  	.main-admin.show-menu .main-body-content{
  		padding-left: 265px;
  	}
  	.main-admin.show-menu .navbar .menu-bar .bars{
  		width: 15px;
  	}
  	.main-admin.show-menu .navbar .menu-bar .bars::after{
  		width: 10px;
  	}
  	.main-admin.show-menu .navbar .menu-bar .bars::before{
  		width: 25px;
  	}
  	.main-admin.show-menu .side-bar-links{
  		opacity: 1;
  	}
  	.main-admin.show-menu .side-bar .side-bar-icons{
  		opacity: 0;
  	}
  	/**** end effacts ****/
  	.side-bar .side-bar-links{
  		opacity: 0;
  		transition:  ease 0.5s;
  	}
  	.side-bar .side-bar-links ul.navbar-nav li a{
  		font-size: 14px;
  		color: #070F40;
  		font-weight: 500;
  		padding: 10px;
  	}
  	.side-bar .side-bar-links ul.navbar-nav li a i{
  		font-size:20px;
  		color: #8ac1f6;
  	}
  	.side-bar .side-bar-links ul.navbar-nav li a:hover, .side-bar-links ul.navbar-nav li a:focus{
  		text-decoration: none;
  		background-color: #8ac1f6;
  		color:#fff;
  	}
  	.side-bar .side-bar-links ul.navbar-nav li a:hover i{
  		color:#fff;
  	}
  	.side-bar .side-bar-logo img{
  		width: 100px;
  		height: 100px;
  	}
  	.side-bar .side-bar-icons{
  		position: absolute;
  		top:20px;
  		right:0;
  		width: 100px;
  		opacity: 1;
  		transition: ease 0.5s;
  	}
  	.side-bar .side-bar-icons .side-bar-logo img{
  		width: 50px;
  		height: 50px;
  		object-fit: cover;
  	}
  	.side-bar .side-bar-icons .side-bar-logo h5{
  		font-size: 14px;
  	}
  	.side-bar .side-bar-icons .set-width{
  		color: #000;
  		font-size: 32px;
  	}
  	.side-bar .side-bar-icons .set-width:hover,.side-bar .side-bar-icons .set-width:focus{
  		color: #8ac1f6;
  		text-decoration: none;
  	}
  </style>
  <body>
  	<div id="page-container" class="main-admin">

	  	<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
		  <a class="navbar-brand" href="#"></a>
		  <div id="open-menu" class="menu-bar">
		  	<div class="bars"></div>
		  </div>
		   	  <?php include("../includes/lien_BOC.php"); ?> 
		   	  
  	<div class="main-body-content w-100 ets-pt">
  		<div class="table-responsive bg-light">
  			<table class="table">

 <main>
			<div class="container">
				<h2 style="text-align: center;">Nouvel administrateur</h2>
				<div class="col-md-12 col-sm-12" id="add_form">

          
					<form action="verification_inscription_admin.php" method="post" enctype="multipart/form-data">

						<div class="mb-4">
							<div class="form-floating">
								<input class="form-control" type="text" name="nom" placeholder="">
								<label>Nom complet</label>
							</div>
						</div>

						<div class="mb-4">
							<div class="form-floating">
								<input class="form-control" type="text" name="password" placeholder="">
								<label>Mot de passe</label>
							</div>

							<div class="form-floating">
								<input class="form-control" type="text" name="statut" placeholder="">
								<label>Statut</label>
							</div>

							<div class="mb-4">
							<div class="form-floating">
								<input class="form-control" type="text" name="email" placeholder="">
								<label>email</label>
							</div>

							<div class="mb-4">
						
	

						<div class="mb-4" >
							<div class="row">
								<div class="col">
									<input class="form-control" type="file" name="image" accept="image/jpeg, image/png">
								</div>
							
							</div>
						</div>


						<div class="mb-4">
							<input class="btn btn-dark form-control" type="submit">
						</div>
					</form>
				</div>
			</div>




      <div id="database"></div>

		</main>
  			</table>
  		</div>
  	</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		jQuery("#open-menu").click(function(){
    			if(jQuery('#page-container').hasClass('show-menu')){
    			jQuery("#page-container").removeClass('show-menu');
    		}
    			
    			else{
    			jQuery("#page-container").addClass('show-menu');
    			}
    		});
    	});
    </script>
  </body>
</html>



<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Ajout de l'abonnement</title>
      
      <link rel="stylesheet" href="css/backoffice-style.css">
  		<link rel="stylesheet" href="css\style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>

      


  
    <br><br><br>


  </body>
</html>
 -->