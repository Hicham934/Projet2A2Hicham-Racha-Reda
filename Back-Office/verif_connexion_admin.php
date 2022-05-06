<?php
// récuperer et traiter les données envoyées par le formulaire via la méthode PDOStatement
//$_POST['email']
//$_POST['password']


if (isset($_POST['email']) && !empty($_POST['email'])) {
  // création du cookie qui expire dans 1heures
  // setcookie('email', $_POST['email'], time() + 3600);
}

if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password']) ) {
  // Rédiriger vers connexion.php avec un message d'erreur
  header('location: connexion_admin.php?message=Vous devez remplir les 2 champs');
  exit;
}

// if(!$_SESSION["id"]){
//   // si n'est pas admin, redirige vers l'index
//   header('location connexion.php');
//   session_destroy();
//   exit;
// }

// écrire une ligne dans le fichier log.numfmt_get_text_attribute

// ouvrir le fichier ou le créer si besoin
$log = fopen('log_admin_connexion.txt','a+');

//création de la ligne à ajouter au log
$line = date("Y/m/d - H:i:s") . ' - Tentative de connexion de : ' . $_POST['email'] . "\n";

fputs($log, $line);

fclose($log);


// vérifier la validité de l'email

if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
  // redirige vers connexion.php avec un message d'erreur
  header('location: connexion_admin.php?message=Email invalide veuillez saisir un email fonctionnel.');
  exit;
}

// try{
//   $db = new PDO('mysql:host=localhost;dbname=TeraOptic', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// }catch(Exception $e){
//   die('Erreur : ' . $e->getMessage()); // Si erreur, afficher le message d'erreur
// }

 include('../includes/db_connexion.php');

// requete  qui vérifie la présence de l'utilisateur dans la base de donées
$q = 'SELECT id FROM admin WHERE email = :email AND password = :password' ;
//Préparation
$req = $db->prepare($q);
// on execute la requete
$reponse = $req->execute([
  'email' => $_POST['email'],
  'password' => hash('sha512',$_POST['password']) // meme algo qu'a la création du compte
]);

// récupere la premiere ligne de résultat
$resultat = $req->fetch();

if ($resultat) {
  // if (isset($_POST['remember']) &&  !empty($_POST['remember'])) {
  //   if ($_POST['remember'] == 'checking') {
  //     // setcookie('email', $_POST['email'], time() + 365 *24 * 3600);
  //   }
  // }

  // créer une session utilisateur
  session_start();

  // ajouter un parametre email à la session utilisateur
  $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $resultat[0];

    // redirection vers l'accueil
    header('location: Back-Office_index.php?&email='.$_SESSION['email']);
    exit;
}else { // Page de connexion
  header('location: connexion_admin.php?message=Identifiant invalide.alert-success');
  exit;
}
 ?>
