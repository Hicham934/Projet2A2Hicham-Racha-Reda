<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<style type="text/css">
*, *::before, *::after {
  box-sizing: border-box;
}



.carousel_wrapper {
  position: relative;
  width: 320px;
  margin: 0px auto 0 auto;
  perspective: 1000px;
  margin-bottom:350px;
}

.carousel {
  position: relative;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transform: rotateY(-360deg) translateZ(-412px);
  animation: swirl 25s steps(10000, end) infinite;
}

.slide {
  position: absolute;
  top: -10px;
  left: 10px;
  width: 300px;
  height: 187px;
}

.slide img {
  width: 280px;
  height: 175px;
  border: 3px inset rgba(47, 115, 201, 0.75);
  box-shadow: 0px 2px 15px 0px rgba(116,186,190,0.5);
}



.slide.one {
  transform: rotateY(0deg) translateZ(412px);
}
.slide.two {
  transform: rotateY(40deg) translateZ(412px);
}
.slide.three {
  transform: rotateY(80deg) translateZ(412px);
}
.slide.four {
  transform: rotateY(120deg) translateZ(412px);
}
.slide.five {
  transform: rotateY(160deg) translateZ(412px);
}
.slide.six {
  transform: rotateY(200deg) translateZ(412px);
}
.slide.seven {
  transform: rotateY(240deg) translateZ(412px);
}
.slide.eight {
  transform: rotateY(280deg) translateZ(412px);
}
.slide.nine {
  transform: rotateY(320deg) translateZ(412px);
}


@keyframes swirl {   
  from {
    transform: rotateY(-360deg);
  }
  to {
    transform: rotateY(0deg);
  }
} 
</style>

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
                    <li><a href="Connexion.php">Connexion</a></li>               
                </ul>
            </div>
        </div>
    </div>
<div class="carousel_wrapper" style="margin-top: 30%;" >
  <div class="carousel">
    <div class="slide one">
      <img src="images/logononconnecte.png">
    </div>
    <div class="slide two">
        <img src="images/logononconnecte.png">
    </div>
    <div class="slide three">
       <img src="images/logononconnecte.png">
    </div>
    <div class="slide four">
       <img src="images/logononconnecte.png">
    </div>
    <div class="slide five">
       <img src="images/logononconnecte.png">
    </div>
    <div class="slide six">
       <img src="images/logononconnecte.png">
    </div>
    <div class="slide seven">
        <img src="images/logononconnecte.png">
    </div>
    <div class="slide eight">
        <img src="images/logononconnecte.png">
    </div>
    <div class="slide nine">
        <img src="images/logononconnecte.png">
    </div>
  </div>
</div>
