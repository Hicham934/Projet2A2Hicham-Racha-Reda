<?php
session_start();

// try{
//   $db = new PDO('mysql:host=localhost;dbname=messagepv', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// }catch(Exception $e){
//   die('Erreur : ' . $e->getMessage()); // Si erreur, afficher le message d'erreur
// }
//Connexion à la base de données
include("../includes/db_connexion.php");
if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
  header('location: ../Page_non_connecte.php?message=Vous devez etre connecté pour avoir accès à cette page.');
  exit;

}

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  $msg = $db->prepare('SELECT * FROM Boite_mail WHERE id_destinataire = ?'); // $id_destinataire == notre id a nous pour récupérer les messages qui nous corresponde
  $msg->execute(array($_SESSION['id']));
  $msg_nbr = $msg->rowCount();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
 include("../includes/header.php"); 
 ?>
  <body>
    <a href="../Contact.php">Nouveau message</a><br><br><br>
    <h3>Votre boite de réception : </h3>
<?php // nl2br Insère un retour à la ligne HTML à chaque nouvelle ligne
if ($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }

  while ($m = $msg->fetch()) {
  $email_exp = $db->prepare('SELECT email FROM Users WHERE id = ? ');
  $email_exp->execute(array($m['id_expediteur']));
  $email_exp =   $email_exp->fetch();
  $email_exp =   $email_exp['email'];
  ?>
  <b><?= $email_exp ?></b> Vous à envoyeé :
  <?= nl2br($m['message']) ?>
  <hr width='100'>
<?php } ?>

  </body>
</html>
<?php } ?>
