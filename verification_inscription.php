<?php


if(!isset($_POST['full_name'])    || empty($_POST['full_name']) 
|| !isset($_POST['email'])        || empty($_POST['email']) 
|| !isset($_POST['adress'])       || empty($_POST['adress']) 
|| !isset($_POST['phone_number']) || empty($_POST['phone_number'])
|| !isset($_POST['password'])     || empty($_POST['password'])){

	header('location: inscription.php?message=Vous devez remplir tous les champs.');
	exit;
}
	
	





if(strlen($_POST['password']) < 8){

    header('location: inscription.php?message=Le mot de passe doit être composer d\'au moins 8 caractères');
    exit;
}

$verif_maj = stripos('[A-Z]',$_POST['password']);
$verif_num = stripos('[0-9]',$_POST['password']);

if(!empty($verif_maj) || !empty($verif_num) ){

  header('location: inscription.php?message=Le mot de passe doit être composer d\'au moins 1 majuscule et 1 nombre');
  exit;
}

if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

	header('location: inscription.php?message=Email invalide.');
	exit;
}

include("includes/db_connexion.php");


$q = 'SELECT id FROM users WHERE email = :email';

$req = $db->prepare($q);

$req->execute([
	'email' => $_POST['email']
]);

$reponse = $req ->fetch();

if($reponse){

	header('location: inscription.php?message=Utilisateur déjà présent');
	exit;
}



$q = 'INSERT INTO users (full_name, email,adress,phone_number,password) VALUES (:full_name,:email,:adress,:phone_number,:password)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'full_name' => $_POST['full_name'],
	'email' => $_POST['email'],
	'adress' => $_POST['adress'],
	'phone_number' => $_POST['phone_number'],
	'password' => hash('sha512',$_POST['password']),
]);

if($reponse){

	header('location: Connexion.php?message=Inscription réussite&email='.$_POST['email'] );
	exit;
}else{

	header('location: inscription.php?message=Erreur lors de l\'inscription.');
	exit;
}

?>
