<?php

session_start();

//condition incomplete
if( !isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['prix']) || empty($_POST['prix']) || !isset($_POST['promotion']) || empty($_POST['promotion']) || !isset($_POST['stripe']) || empty($_POST['stripe']) 
	){
	// Rediriger vers add_equipement.php avec un message d'erreur
	header('location: add_items.php?message=Vous devez remplir tous les champs.');
	exit;
}

// Vérifier si fichier envoyé
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

		// Vérifier le type de fichier
		$acceptable = [
			'image/jpeg',
			'image/png'
		];

		if(!in_array($_FILES['image']['type'], $acceptable)){
			// Rediriger vers add_equipement.php avec un message d'erreur
			header('location: add_items.php?message=Type de fichier incorrect.');
			exit;
		}


		// Vérifier le poids du fichier
		$maxSize = 2 * 1024 * 1024;  //2Mo

		if($_FILES['image']['size'] > $maxSize){
			// Rediriger vers add_equipement.php avec un message d'erreur
			header('location: add_items.php?message=Ce fichier est trop lourd.');
			exit;
		}


		// Enregistrer le fichier sur le serveur
		// Chemin d'enregistrement
		$path = '../Back-Office/uploads/items';

		// Vérifier que le dossier uploads existe, sinon le créer
		if(!file_exists($path)){
			mkdir($path, 0777);
		}

	$filename1 = $_FILES['image']['name'];

		//Récupérer l'extentiondu Fichier
		// $ext
		$exte1 = explode('.',$filename1);
		$ext1 = end($exte1);
		$filename1 = $_POST['nom'] . '-' . $_POST['prix'].'-4.'.$ext1;

		// Déplacer le fichier vers son emplacement définitif (le dossier uploads)
		$destination = $path . '/' . $filename1;
		move_uploaded_file($_FILES['image']['tmp_name'], $destination);
     
}


include("../includes/db_connexion.php");

//Vérifier que le model n'est pas déjà présent
$q = 'SELECT id FROM Article WHERE nom = :nom';
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
	header('location: add_items.php?message=Item déjà présent');
	exit;
}

// format de date et heure
$dateTime = date('Y-m-d-h-i-s');


//Insérer une nouvelle equipement
$q = 'INSERT INTO Article (nom,prix, promotion,image,add_date,add_admin,stripe) VALUES (:nom,:prix,:promotion,:image,:add_date,:add_admin,:stripe)';
$req = $db->prepare($q);
$reponse = $req->execute([
	'nom' => $_POST['nom'],
	'prix' => $_POST['prix'],
	'promotion' => $_POST['promotion'],
	'image' => isset($filename1) ? $filename1 : '',
	'add_date' => $dateTime,
	'add_admin' => $_SESSION['email'],
	'stripe' => $_POST['stripe']
]);

if($reponse){
	// Ecrire une ligne dans le fichier log_admin.txt
	// Ouvrir le fichier ou le créer si besoin
	$log = fopen('log_admin.txt', 'a+');
	// Création de la ligne à ajouter au log
	$line = date("Y/m/d - H:i:s") . ' - AJOUT ITEM: ' . $_POST['nom'] . ' -- '. $_POST['prix'] . ' -- ' .$_POST['promotion']. ' -- par ' .$_POST['add_admin']. "\n";
	fputs($log, $line);
	fclose($log);

	// Afficher message de réussite
	header('location: add_items.php?message=Item ajouter avec succès');

	exit;
}else{
	// Rediriger vers add_equipement.php avec un message d'erreur
	header('location: add_items.php?message=Erreur lors de l\'ajout.');
	exit;
}

?>
