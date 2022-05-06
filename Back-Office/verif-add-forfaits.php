<?php

session_start();

//condition incomplete


// Vérifier si fichier envoyé
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

		// Vérifier le type de fichier
		$acceptable = [
			'image/jpeg',
			'image/png'
		];

		if(!in_array($_FILES['image']['type'], $acceptable)){
			// Rediriger vers add_equipement.php avec un message d'erreur
			header('location: verif-add-forfaits.php?message=Type de fichier incorrect.');
			exit;
		}


		// Vérifier le poids du fichier
		$maxSize = 2 * 1024 * 1024;  //2Mo

		if($_FILES['image']['size'] > $maxSize){
			// Rediriger vers add_equipement.php avec un message d'erreur
			header('location: verif-add-forfaits.php?message=Ce fichier est trop lourd.');
			exit;
		}


		// Enregistrer le fichier sur le serveur
		// Chemin d'enregistrement
		$path = '../Back-Office/uploads/Forfaits';

		// Vérifier que le dossier uploads existe, sinon le créer
		if(!file_exists($path)){
			mkdir($path, 0777);
		}

		
		$filename1 = $_FILES['image']['name'];

		//Récupérer l'extentiondu Fichier
		// $ext
		$exte1 = explode('.',$filename1);
		$ext1 = end($exte1);
		$filename1 = $_POST['nom'] . '-' . $_POST['image'].'-1.'.$ext1;

		// Déplacer le fichier vers son emplacement définitif (le dossier uploads)
		$destination = $path . '/' . $filename1;
		move_uploaded_file($_FILES['image']['tmp_name'], $destination);

}


include("../includes/db_connexion.php");

//Vérifier que le model n'est pas déjà présent
$q = 'SELECT id FROM Forfaits WHERE nom = :nom';
//Préparer la reqête
$req = $db->prepare($q);
//Executer la requête
$req->execute([
	'nom' => $_POST['nom']
]);
//Récupérer la première ligne de résultat
$reponse = $req ->fetch(); //Renvoie la première ligne sous forme de tableau ou nue valeur bool FALSE
//Si cette ligne existe: erreur, l'email est déjà utilisé
if($reponse){
	// Rediriger vers la page d'accueil
	header('location: verif-add-forfaits.php?message=Forfait déjà présent');
	exit;
}

// format de date et heure
$dateTime = date('Y-m-d-h-i-s');


//Insérer une nouvelle equipement
$q = 'INSERT INTO Forfaits (nom,description,image,add_date,add_admin) VALUES (:nom,:description,:image,:add_date,:add_admin)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'nom' => $_POST['nom'],
	'description' => $_POST['description'],
	'image' => isset($filename1) ? $filename1 : '',
	'add_date' => $dateTime,
	'add_admin' => $_SESSION['email']
]);

if($reponse){
	// Ecrire une ligne dans le fichier log_admin.txt
	// Ouvrir le fichier ou le créer si besoin
	$log = fopen('log_admin.txt', 'a+');
	// Création de la ligne à ajouter au log
	$line = date("Y/m/d - H:i:s") . ' - AJOUT FORFAITS: ' . $_POST['nom'] . ' -- '. $_POST['description'] . ' -- ' .$_POST['image']. ' -- par ' .$_POST['add_admin']. "\n";
	fputs($log, $line);
	fclose($log);

	// Afficher message de réussite
	header('location: verif-add-forfaits.php?message=Forfait ajouter avec succès');

	exit;
}else{
	// Rediriger vers add_equipement.php avec un message d'erreur
	header('location: verif-add-forfaits.php?message=Erreur lors de l\'ajout.');
	exit;
}

?>
