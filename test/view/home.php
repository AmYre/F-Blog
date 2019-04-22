<?php 
$title = 'Mon site';
$h1 = 'Bienvenue sur mon site';
$h2 = 'N\'hésitez pas à vous connecter pour profiter pleinement de l\'experience';
$style = 'public/style.css';

?>

<?php ob_start(); ?>

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="public/img/fire.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>On fire and Ice</h5>
          <p>Le livre qui à propulsé Jean dans le monde litteraire.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/img/deus.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Pour que notre joie demeure</h5>
          <p>Un pollar angoissant à ne pas mettre entre toute les mains.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="public/img/ville.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Et si c'étais nous?</h5>
          <p>Un roman poétique et politique sur l'évolution des civilisations.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>