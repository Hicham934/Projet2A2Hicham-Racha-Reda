<?php
session_start();

include('includes/db_connexion.php');

if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
    
   include("Page_non_connecte.php");
}

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  if (isset($_POST['envoi_message'])) {
    if (isset($_POST['destinataire'],$_POST['message']) && !empty($_POST['destinataire']) && !empty($_POST['message'])) {

      $destinataire = htmlspecialchars($_POST['destinataire']);
      $message = htmlspecialchars($_POST['message']);

      $id_destinataire = $db->prepare('SELECT id FROM Users WHERE email = ?');
      $id_destinataire->execute(array($destinataire));

      $dest_exist = $id_destinataire->rowCount(); // retourne le nombre de lignes affectées par le dernier
      if ($dest_exist == 1) {

        $id_destinataire = $id_destinataire->fetch();
        $id_destinataire = $id_destinataire['id']; // récupére l'id de ce tableau

        $insert = $db->prepare('INSERT INTO Boite_mail(id_expediteur, id_destinataire,message) VALUES (?,?,?)');
        $insert->execute(array($_SESSION['id'], $id_destinataire, $message));

        $error = "Votre message à bien était envoyé :";
      }else{
          $error = "Cette utilisateur n'existe pas";
      }


    }else {
      $error = "Veuillez compléter tous les champs";
    }
  }

   ?>
<?php
 include("includes/header.php"); 
 ?>

<style type="text/css">



.admin-sidenav {
    width: auto;
  height: auto;
  margin-left: 0px; 
}
.admin-sidenav a {
  text-decoration: none; 
}
.admin-sidenav li {
  text-align: justify;
  padding: .5rem;
  padding-left: 1rem;
  -webkit-transition: all .2s linear;
  transition: all .2s linear;
  background-color: #000;
  border: 1px solid #333; 
}
.admin-sidenav li a {
  color: #fff; 
}

.admin-sidenav li a:active {
  border-color: #02d3f5; 
}

.admin-sidenav li:hover {
  border-radius: 0 .5rem .5rem 0;
  border-color: #02d3f5;
  -webkit-transform: translate(30px, 0px);
  transform: translate(30px, 0px);
  background: -webkit-linear-gradient(left, #006a7b, #002340);
  background: linear-gradient(to right, #006a7b, #002340); 
}

.admin-sidenav li:active {
  border-color: #02d3f5; 
}
  </style>
    <div class="container-fluid" style="position: absolute; z-index: 1;">
        <div class="row">    
            <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
                <ul class="sidenav admin-sidenav list-unstyled">
                    <li><a href="index.php">Acceuil</a></li>               
                </ul>
            </div> <!-- /#admin-sidebar -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
<body style="background-color: #4682B4;">
<div class="container" style="margin-top: 12%;"  >
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">





                    <form  method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class=" text-white text-center py-2" style="background-color: #070F40";>
                                    <h3><i class="fa fa-envelope"></i>Contactez nous</h3>
                                    <p class="m-0">Nous vous aiderons avec plaisir</p>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                 <div class="form-group" >
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" name="destinataire" placeholder="Destinataire" required></textarea>
                                    </div>
                                </div>



                                <div class="form-group" >
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" name="message" placeholder="Contenue du message" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="envoi_message" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #070F40";>
                                        <?php if (isset($error)) 
                                    {
                                        echo '<span style="color:red">' . $error. '</span>';
                                     } ?>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div style="text-align: center;"><h5>ou</h5></div>
                                <a href="https://api.whatsapp.com/send?phone=330782886910">
                                <div class="text-center">
                                    <input type="submit" value="WhatsApp" class="btn btn-info btn-block rounded-0 py-2" style="background-color: #070F40";>
                                </div></a>
                    <!--Form with header-->


                </div>
	</div>
</div>
</body>
<?php
  }
?>
