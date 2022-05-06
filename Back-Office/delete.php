<?php
// Connexion à la base de données
include('../includes/db_connexion.php');
// session_start();

$del = 'DELETE FROM '.$_GET['table'].' WHERE id = '. $_GET['id'];
echo $del;
$delet = $db->prepare($del);
$delete = $delet->execute();
if($delete){
  // Ecrire une ligne dans le fichier log_admin.txt
  // Ouvrir le fichier ou le créer si besoin
  $log = fopen('log_admin_delete.txt', 'a+');
  // Création de la ligne à ajouter au log
  $line = date("Y/m/d - H:i:s") . ' - SUPPRESSION '.strtoupper($_GET['table']).': id = ' . $_POST['delete'] . ' -- par '. $_SESSION["id"] . "\n";
  fputs($log, $line);
  fclose($log);
  header('location: Back-Office_index.php?message=Supression réussite.&type=success');
} else {
  header('location: Back-Office_index.php?message=Erreur lors de la suppression.&type=danger');
}
?>
