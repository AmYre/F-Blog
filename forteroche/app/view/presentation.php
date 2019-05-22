<?php
error_reporting(E_ALL);?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title>Présentation</title>
		<link rel="stylesheet" href="/forteroche/public/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=0zyt0uc363koowi3vpni9xwls9t0s9tzss66rx4o3098iije"></script>
		<script>tinymce.init({selector:'textarea.tinymce', width: '850px', height : '400px',});</script>
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>

	<body class="jean">

      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
          <a class="navbar-brand" href='/forteroche/app/Home/show'><img src="/forteroche/public/img/logoj.png" id="logo"><i class="fas fa-home"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                 
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Tchat/show"><i class="far fa-comments"></i> Le Tchat des Rocheux</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      	<i class="fab fa-readme"></i> Lire en ligne
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/forteroche/app/Listing/show_books"><i class="fas fa-book"></i>  Par Livres</a>
                          <a class="dropdown-item" href="#"><i class="far fa-heart"></i>  Par Genres</a>
                          <a class="dropdown-item" href="/forteroche/app/Listing/show_chapters"><i class="far fa-bookmark"></i>  Par Chapitres</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Vous aurez la possibilité de laisser un commentaire en fin de lecture</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Acheter les Livres</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Jean/show"><i class="fas fa-pen-fancy"></i> L'auteur</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Contact/show"><i class="far fa-envelope"></i> Contact</a>
                  </li>
              </ul>

                  <ul class="navbar-nav mr-auto">
                      <?php 
                          if (isset ($_SESSION['identifiant']) && $_SESSION['identifiant'] == 'ADMIN' ) {
                            echo '
                      <li class="nav-item">
                          <a id="admin" class="nav-link" href="/forteroche/app/Write/show">ADMIN</a>
                      </li>
                      <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                          <button type="submit" class="btn btn-dark" name="disconnect_btn"><i class="fas fa-user-times"></i> Me déconnecter</button>
                          </form>
                      </li>'; } 
                      
                          elseif (isset ($_SESSION['identifiant'])) {
                              echo '
                              <li class="nav-item">
                                  <a id="connected" class="nav-link" href="/forteroche/app/User/show"><i class="far fa-user"></i> Mon Espace (<strong>'.$_SESSION['identifiant'].'</strong>)</a> 
                              </li>
                              <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                                  <button type="submit" class="btn btn-dark" name="disconnect_btn"><i class="fas fa-user-times"></i> Me déconnecter</button>
                                  </form>
                              </li>'; 

                          }else { echo '
                              <li class="nav-item">
                                  <a id="connect" class="nav-link" href="/forteroche/app/Connexion/show"><i class="far fa-user"></i> Se connecter</a>
                              </li>
                              <li class="nav-item">
                                  <a id="create" class="nav-link" href="/forteroche/app/Create/show"><i class="fas fa-link"></i> Devenir Rocheux</a>
                              </li>';}
                      ?>
                  </ul>
                  <a class="navbar-brand" href='/forteroche/app/Home/show'><img src="/forteroche/public/img/book.png" id="book-logo"></a>
                  <!-- BARRE DE RECHERCHE AJAX -->
              <!--<div class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" name ='search' id='search' placeholder="Recherche.." aria-label="Recherche">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
              </div> -->

          </div>
      	</nav>

        <div class="panel-jean">
            <h1 class="display-4 tchat-title gradient">Jean Forteroche</h1>
            <h2 class="lead tchat-sub"> Un petit bout de moi...</h2>
        </div>

        <div class="text-justify prez lead container text-light">
            <p>Je suis né près de Toulon un jour où le port de Dunkerque était pris par les glaces.
            Le soir même, dans «Bonne nuit les petits», Nounours sautait de son nuage avec un parapluie 
            ouvert pour aller s'écraser dans la chambre de Pimprenelle et Nicolas. Les Beatles envahissaient les 
            ondes alors avec «Please please me» et la planète venait de frôler l'apocalypse nucléaire avec la 
            crise des missiles de Cuba...</p> 
            
            <p>Nous étions des gens de peu, de terre et d'usine : 
            Papa cultivateur, puis au trois-huit dans les chantiers navals, Maman à la serpillière et derrière le cul de ses mômes. 
            Mais sur les étagères de mon frère ainé il y avait toujours des livres et, sur le bureau, des 
            beaux cahiers d'écolier impeccablement tenus. Je savais déjà qu'une part essentielle de mon existence 
            tiendrait entre ces deux pôles. J'aurai toujours le nez dans un bouquin et une plume dans 
            l'encrier ou, plus tard, les doigts sur le clavier…</p> 

            <p>Il faut vivre avec son temps. Une insatiable curiosité pour les êtres et les choses, d'ici et d'ailleurs, m'a toujours animé. 
            Le passé comme trésor, l'avenir comme horizon, le présent pour apprendre, 
            découvrir, agir et échanger, voilà mon humaine trinité, mon credo quotidien.
            Mon parcours d'autodidacte est atypique : rétif à toute hiérarchie, j'ai toujours privilégié 
            la liberté, l'indépendance, l'inattendu des rencontres, les petits défis à soi-même, 
            les sentiers de traverse plutôt que les voies trop balisées, les plans de carrière. 
            Des petits boulots de jeunesse dans l'imprimerie, la presse locale ou les bibliothèques, 
            en passant par des travaux de secrétariat puis, plus tard, des responsabilités de rédacteur, 
            de correcteur, de chroniqueur pour des agences de communication, des revues indépendantes 
            ou dans l'édition, jusqu'à l'exercice actuel de mon activité en « freelance » depuis 
            quelques années, je n'ai jamais cessé d'avoir l'écrit comme fil rouge.
            Mes expériences professionnelles, mes créations personnelles dans le domaine de la chanson ou 
            de la littérature, tous ces choix, ces chemins ou hasards de la vie m'ont amené à connaître
            des milieux sociaux très différents, à côtoyer des personnalités fort diverses.</p>
            
            <p>J'ai ainsi appris à écouter le murmure des vies « ordinaires », à cultiver mon goût des autres.
            Quand j'ai perdu mes parents, j'ai regretté de ne pas en avoir su un peu plus sur leurs origines, 
            sur les ressorts cachés et les méandres de leurs destins désormais accomplis. Ce manque a donné 
            du sens à mes aventures de polygraphe. J'ai alors pris conscience de la fragilité des souvenirs :
            dès lors qu'une parole n'était pas recueillie, consignée noir sur blanc, elle risquait au mieux 
            d'être trahie, au pire de se perdre. Je crois en la force des mots, propres à raviver la mémoire, à recréer du lien.
            Il y a quelques années, lassé du tourbillon de la capitale, j'ai posé mes valises en Normandie, 
            dans le charmant Pays d'Auge.</p>

            <p>J’y demeure aujourd’hui en humble artisan de l'écriture, prêtant l'oreille et la main 
            à tous ceux qui éprouvent le besoin de se souvenir, de se raconter, de partager leur mémoire.</p>
        </div>

        <div class="loader-wrapper">
			<span class="loader"><span class="loader-inner"></span></span>
		</div>
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
  			src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  			integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  			crossorigin="anonymous"></script>
        <script type="text/javascript" src="/forteroche/public/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  


		<footer class="page-footer font-small cyan darken-3">

			<div id="footer" class="footer-copyright text-center py-3">
			<p> © Copyright 2019 - All rights reserved | <span class="p4">PROJET4 AMIR</span> | Développeur Web Junior</p>
			</div>

		</footer>

    </body>
</html>
 
