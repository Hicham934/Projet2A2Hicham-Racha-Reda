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

<div class="carousel_wrapper" style="margin-top: 30%;">
  <div class="carousel">
    <div class="slide one">
      <img src="images/logochargement.png">
    </div>
    <div class="slide two">
        <img src="images/logochargement.png">
    </div>
    <div class="slide three">
       <img src="images/logochargement.png">
    </div>
    <div class="slide four">
       <img src="images/logochargement.png">
    </div>
    <div class="slide five">
       <img src="images/logochargement.png">
    </div>
    <div class="slide six">
       <img src="images/logochargement.png">
    </div>
    <div class="slide seven">
        <img src="images/logochargement.png">
    </div>
    <div class="slide eight">
        <img src="images/logochargement.png">
    </div>
    <div class="slide nine">
        <img src="images/logochargement.png">
    </div>
  </div>
</div>
