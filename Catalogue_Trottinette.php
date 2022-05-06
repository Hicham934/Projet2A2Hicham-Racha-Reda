 <?php
 include("includes/header.php"); 
 ?>

 <style type="text/css">

.admin-sidenav {
    width: auto;
  height: auto;
  margin-right: 0px; 
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


<style type="text/css">
  .demo{padding:45px 0}
.product-grid2{font-family:'Open Sans',sans-serif;position:relative}
.product-grid2 .product-image2{overflow:hidden;position:relative}
.product-grid2 .product-image2 img{width:100%;height:auto}
.product-image2 .pic-1{opacity:1;transition:all .5s}
.product-grid2:hover .product-image2 .pic-1{opacity:0}
.product-image2 .pic-2{width:100%;height:100%;opacity:0;position:absolute;top:0;left:0;transition:all .5s}
.product-grid2:hover .product-image2 .pic-2{opacity:1}
.product-grid2 .social{padding:0;margin:0;position:absolute;bottom:50px;right:25px;z-index:1}
.product-grid2 .add-to-cart{color:#fff;background-color:#000;font-size:15px;text-align:center;width:100%;padding:10px 0;display:block;position:absolute;left:0;bottom:-100%;transition:all .3s}
.product-grid2 .add-to-cart:hover{background-color:#3498db;text-decoration:none}
.product-grid2:hover .add-to-cart{bottom:0}
.product-grid2 .product-new-label{background-color:#3498db;color:#fff;font-size:17px;padding:5px 10px;position:absolute;right:0;top:0;transition:all .3s}
.product-grid2:hover .product-new-label{opacity:0}
.product-grid2 .product-content{padding:20px 10px;text-align:center}
.product-grid2 .title{font-size:17px;margin:0 0 7px}
.product-grid2 .price{color:#303030;font-size:15px}
@media screen and (max-width:990px){.product-grid2{margin-bottom:30px}
}
</style>
<div class="container" style="margin-top: 5em; ">
    <div class="row">
       
<?php
      include("includes/db_connexion.php");
      $max = $db->query('SELECT max(id) AS _max FROM Catalogue_trottinette');
      $req_max = $max->fetch(PDO::FETCH_ASSOC);
      $min = $db->query('SELECT min(id) AS _min FROM Catalogue_trottinette');
      $req_min = $min->fetch(PDO::FETCH_ASSOC);

      //echo '<p>'.$max["id"].'-----'.$req_max['_max'].'</p>';
      if($req_min['_min'] != NULL && $req_max['_max'] != NULL){
      for ($i = $req_min['_min']; $i <= $req_max['_max']; $i++) {
        $req_test = $db->query('SELECT id FROM Catalogue_trottinette WHERE id ='.$i);
        $test = $req_test->fetch(PDO::FETCH_ASSOC);
        if($test){
          $requete = $db->query('SELECT image1,image2,Nom_complet,prix FROM Catalogue_trottinette WHERE id = '.$i);
          $req = $requete->fetch();
          echo '<div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="#">
                        <img class="pic-1" src="Back-Office/uploads/trottinette/'.$req["image1"].'">
                        <img class="pic-2" src="Back-Office/uploads/trottinette/'.$req["image2"].'">
                    </a>
                    <a class="add-to-cart" href="Informations_trottinettes.php?Nom_complet='.$req["Nom_complet"].'">En savoir plus</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="">'.$req["Nom_complet"].'</a></h3>
                    <span class="price">'.$req["prix"].'€</span>
                </div>
            </div>

        </div>';
      }
    }
  }



    ?>
        
      
    </div>
</div>

 