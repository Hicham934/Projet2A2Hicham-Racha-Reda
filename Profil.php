
<?php
 include("includes/header.php"); 
 ?>
<link rel="stylesheet" type="text/css" href="style.css">
<body  style="background: -webkit-linear-gradient(left, #4682B4, #4682B4);">

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
            </div>
        </div>
    </div>
 <?php 

session_start();

include("includes/db_connexion.php");
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  $msg = $db->prepare('SELECT * FROM Boite_mail WHERE id_destinataire = ?');
  $msg->execute(array($_SESSION['id']));
  $msg_nbr = $msg->rowCount(); }?>



<div class="container emp-profile" style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Khadda Hicham
                                    </h5>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Boite de réception</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="Contact.php" role="tab" aria-controls="profile" aria-selected="false">Nouveau message</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
       
             
        </div>
        </body>
    
       