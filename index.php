
<?php 
session_start();
 ?>
    <head><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/acceuil.js"></script>
<script type="text/javascript"></script></head>


    <style type="text/css">
        
.flex-grid {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: stretch;
}
.flex-grid .grid-item-wrapper {
  position: relative;
  width: 100%;
  height: 100%;
}
.flex-grid .grid-item {
  width: 100%;
  padding: 1rem;
  position: relative;
}
.flex-grid .grid-item h4 {
  margin-bottom: .5rem;
  margin-top: 0;
  font-weight: 400;
}
.flex-grid .grid-item-bg-img {
  position: relative;
  height: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  filter: sepia(0.3) saturate(0.8);
  -webkit-filter: sepia(0.3) saturate(0.8);
}
.flex-grid.featured-content .grid-item-wrapper {
  overflow: hidden;
}

.flex-grid.featured-content .grid-item-wrapper .grid-item-bg-img {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.35s;
  transition: transform 0.35s;
}
.flex-grid.featured-content .grid-item-wrapper:hover .grid-item-bg-img {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
  -webkit-transition: -webkit-transform 4s cubic-bezier(0.39, 0.575, 0.565, 1);
  transition: transform 4s cubic-bezier(0.39, 0.575, 0.565, 1);
}
.flex-grid.featured-content .grid-item-wrapper .grid-item-content {
  -webkit-transition: opacity 0.35s;
  -moz-transition: opacity 0.35s;
  -ms-transition: opacity 0.35s;
  -o-transition: opacity 0.35s;
  transition: opacity 0.35s;
  opacity: 0;
}
.flex-grid.featured-content .grid-item-wrapper:hover .grid-item-content {
  opacity: 1;
  -webkit-transition: opacity 0.6125s cubic-bezier(0.39, 0.575, 0.565, 1);
  -moz-transition: opacity 0.6125s cubic-bezier(0.39, 0.575, 0.565, 1);
  -ms-transition: opacity 0.6125s cubic-bezier(0.39, 0.575, 0.565, 1);
  -o-transition: opacity 0.6125s cubic-bezier(0.39, 0.575, 0.565, 1);
  transition: opacity 0.6125s cubic-bezier(0.39, 0.575, 0.565, 1);
}
.flex-grid.featured-content .grid-item {
  height: 50vh;
  padding: 0;
  position: relative;
}
.flex-grid.featured-content .grid-item-content {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  padding: .5rem .75rem;
  font-size: 1rem;
  font-weight: 300;
  /* text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6); */
  color: #fff;
  background: rgba(0, 0, 0, 0.5);
  background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 100%);
  background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 100%);
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 100%);
}
.flex-grid.featured-content .grid-title {
  font-size: 3.5rem;
  text-align: center;
  font-weight: bold;
}
.grid-details{
    text-align: center;
    font-size: 2rem;
}
.flex-grid.featured-content .grid-item-content-details {
  height: 300px;
  overflow: hidden;
  margin: 5%;
}
.flex-grid.featured-content .grid-action {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: .75rem;
  text-align: right;
}
.btn {
  background: #333;
  color: #fff;
  font-size: 1.2rem;
  padding: .75rem 1rem;
  text-transform: uppercase;
  text-shadow: none;
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-transition: background-color 0.2s ease-out;
  -moz-transition: background-color 0.2s ease-out;
  -ms-transition: background-color 0.2s ease-out;
  -o-transition: background-color 0.2s ease-out;
  transition: background-color 0.2s ease-out;
}
.btn--clear {
  background: transparent;
  color: #fff;
}
.btn--clear:before {
  content: ' ';
  position: absolute;
  width: 100%;
  height: 100%;
  border: 3px solid #fff;
  top: 0;
  left: 0;
}
.btn--clear:hover {
  background: #4682B4;
}
.sidebar-brand{
    background-color: #4682B4;
}
    </style>
   




<div id="wrapper">
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="Wheater.php">
                       Méteo
                    </a>
                </li>
                 <?php
                if (!isset($_SESSION["id"])) {
                  ?>
                <li>
                    <a href="Connexion.php">Connexion</a>
                </li>
                <li>
                    <a href="inscription.php">Inscription</a>
                </li>
                 <li>
                    <a href="Contact.php">Contact</a>
                </li>
                <li>
                    <a href="informations_createurs.php">Qui sommes nous</a>
                </li>
                <?php } ?>
            
                <?php
                if (isset($_SESSION["id"])) {
                  ?>
                  <li>
                    <a href="Forfaits.php">Forfaits</a>
                </li>
                <li>
                    <a href="article.php">Achats</a>
                </li>
                <li>
                    <a href="Contact.php">Contact</a>
                </li>
                <li>
                    <a href="informations_createurs.php">Qui sommes nous</a>
                </li>
                <li>
                    <a href="Panier.php">Panier</a>
                </li>
                <li>
                    <a href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="Back-Office/Back-Office_index.php">Gerer le service</a>
                </li>
                <li>
                    <a href="deconnexion.php">Deconnexion</a>
                </li>
            <?php } ?>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
           
                <span class="hamb-top" style="background-color: white;" ></span>
                <span class="hamb-middle" style="background-color: white;"></span>
                <span class="hamb-bottom" style="background-color: white;"></span>
            
            </button>

    <div class="flex-grid featured-content">
      <div class="grid-item">
         <div class="grid-item-wrapper">
         <div class="grid-item-bg-img"  >
         <img src="Back-Office/uploads/information_Acceuil/game.jpg">
         </div>
              <div class="grid-item-content">
                    <div class="grid-item-content-details">
                         <h4 class="grid-title">NOUVEL TECHNOLOGIE</h4><br>
                         <div class="grid-details">Louez une trottinette, vous serez libre</div>
                    <div class="grid-action">
                    <a href="../three.js-master/examples/EnDeaVor.html">     <div class="btn btn--clear">En savoir plus</div></a>
                    </div>
              </div>
         </div>
      </div>
      </div>
     

     
  </div>
         
