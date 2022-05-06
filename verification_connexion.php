<?php


if (isset($_POST['email']) && !empty($_POST['email'])) {

}

if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) ) {

  header('location: Connexion.php?message=Vous devez remplir les 2 champs');
  exit;
}



$log = fopen('log.txt','a+');


$line = date("Y/m/d - H:i:s") . ' - Tentative de connexion de : ' . $_POST['email'] . "\n";

fputs($log, $line);

fclose($log);



if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

  header('location: Connexion.php?message=Email invalide veuillez saisir un email fonctionnel.');
  exit;
}


 include('includes/db_connexion.php');

$q = 'SELECT id FROM users WHERE email = :email AND password = :password';

$req = $db->prepare($q);

$reponse = $req->execute([
  'email' => $_POST['email'],
  'password' => hash('sha512',$_POST['password'])
]);


$resultat = $req->fetch();

if ($resultat) {

  session_start();


  $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $resultat[0];


    header('location: index.php?&email='.$_SESSION['id']);
    exit;
}else {
  header('location: Connexion.php?message=Identifiant invalide.alert-success');
  exit;
}
 ?>
