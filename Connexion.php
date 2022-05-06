<?php
 include("includes/header.php"); 
 ?>
<link rel="stylesheet" type="text/css" href="style.css">

<!DOCTYPE html>
<html>
    
<head>
	<title>Connexion chez EnDeaVor</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body  style="background-color:#4682B4;">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="verification_connexion.php" method="post" enctype="multipart/form-data"> 
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" class="form-control input_user" value="" placeholder="email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Mot de passe">
						</div>

				    <input type="submit" name="button"class="btn login_btn">
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Vous n'avez pas de compte? <a href="inscription.php" class="ml-2">S'inscrire</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="Change_password.php">Mot de passe oublier?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
