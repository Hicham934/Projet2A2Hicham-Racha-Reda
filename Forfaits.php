

<?php
 include("includes/header.php"); 
 ?>

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet"/>
</head>
<body>
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
     <h1 style="text-align: center; font-size: 45px; margin-top: 3%; margin-bottom: 3%;">Nos offres</h1>

</body>
<section class="our-webcoderskull padding-lg" style="box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;">
  <div class="container">
     <ul class="row">
   <?php
      include("includes/db_connexion.php");
      $max = $db->query('SELECT max(id) AS _max FROM Forfaits');
      $req_max = $max->fetch(PDO::FETCH_ASSOC);
      $min = $db->query('SELECT min(id) AS _min FROM Forfaits');
      $req_min = $min->fetch(PDO::FETCH_ASSOC);


      if($req_min['_min'] != NULL && $req_max['_max'] != NULL){
      for ($i = $req_min['_min']; $i <= $req_max['_max']; $i++) {
        $req_test = $db->query('SELECT id FROM Forfaits WHERE id ='.$i);
        $test = $req_test->fetch(PDO::FETCH_ASSOC);
        if($test){
          $requete = $db->query('SELECT * FROM Forfaits WHERE id = '.$i);
          $req = $requete->fetch();
          echo ' 
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="images/'.$req["image"].'" ></figure>
            <h3><a href="http://www.webcoderskull.com/">'.$req["nom"].'</a></h3>
            <label>Permet d\'avoir accès à :</label><p>'.$req["description"].'</p>
            <ul class="follow-us clearfix">
              <li><a href="Catalogue_Trottinette.php"><i class="fa fa-check" aria-hidden="true"></i></a></li>     
            </ul>
          </div>
      </li>
   ';
      }
    }
  }
?>
 </ul>
  </div>
</section>