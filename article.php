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
    <div class="container-fluid" style="position: absolute; z-index: 1;">
        <div class="row">    
            <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
                <ul class="sidenav admin-sidenav list-unstyled">
                    <li><a href="index.php">Acceuil</a></li>               
                </ul>
            </div> <!-- /#admin-sidebar -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
<div class="container" style="margin-top: 5em;">
    <div class="row">
        
 
  <?php
      include("includes/db_connexion.php");
      $max = $db->query('SELECT max(id) AS _max FROM Article');
      $req_max = $max->fetch(PDO::FETCH_ASSOC);
      $min = $db->query('SELECT min(id) AS _min FROM Article');
      $req_min = $min->fetch(PDO::FETCH_ASSOC);

      if($req_min['_min'] != NULL && $req_max['_max'] != NULL){
      for ($i = $req_min['_min']; $i <= $req_max['_max']; $i++) {
        $req_test = $db->query('SELECT id FROM Article WHERE id ='.$i);
        $test = $req_test->fetch(PDO::FETCH_ASSOC);
        if($test){
          $requete = $db->query('SELECT * FROM Article WHERE id = '.$i);
          $req = $requete->fetch();
          echo '<div class="col-md-3 col-sm-6">
            <div class="product-grid6" style="margin-bottom: 2em;">
                <div class="product-image6">
                    <a href="">
                        <img class="pic-1" src="Back-Office/uploads/items/'.$req["image"].'" >
                    </a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="">'.$req["nom"].' </a></h3>
                    <div class="price" name="prix">'.$req["prix"].'€
                        <span >'.$req["promotion"].'€</span>
                    </div>
                </div>
                <ul class="social">
                <li><a href="'.$req["stripe"].'" data-tip="Ajouté à mon panier"><i class="fa fa-shopping-cart"></i></a></li>
                    <li><a href="article_page.php?nom='.$req["nom"].'" data-tip="Plus"><i class="fa fa-search"></i></a></li>        
                </ul>
            </div>
        </div>';
      }
    }
  }



    ?>
       </div>
       </form>
</div>

<!-- Footer -->
 <!--    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quick links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>About</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                        <li><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                        <li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.fiverr.com/share/qb8D02" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <hr>
            </div>  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p>
                    <p class="h6">© All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p>
                </div>
                <hr>
            </div>  
        </div>
    </section> -->