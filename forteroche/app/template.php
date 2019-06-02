<?php error_reporting(E_ALL);
ini_set("display_errors", 1); ?>

<!DOCTYPE html>

<html lang="fr">

    <head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="/forteroche/public/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=0zyt0uc363koowi3vpni9xwls9t0s9tzss66rx4o3098iije"></script>
		<script>tinymce.init({selector:'textarea.tinymce', max_width: '1250px', height : '600px',});</script>
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
		<title>Forteroche Live</title>
        <link rel="shortcut icon" href="/forteroche/public/img/plume-écrivain.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="FORTEROCHE LIVE, Vivez toute les publications de votre auteur préféré directement en ligne !">
        <meta name="keywords" content="Jean Forteroche, Lecture en ligne, Alaska">
	</head>

	<body class="bg">

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">

            <a class="navbar-brand" href='/forteroche/app/Home/show'><img src="/forteroche/public/img/logoj.png" alt="logo du site" id="logo"><i class="fas fa-home"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/forteroche/app/Tchat/show"><i class="far fa-comments"></i> Tchat</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-readme"></i> Lire
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/forteroche/app/Listing/show_books"><i class="fas fa-book"></i>  Par Livres</a>
                            <a class="dropdown-item" href="#"><i class="far fa-heart"></i>  Par Genres</a>
                            <a class="dropdown-item" href="/forteroche/app/Listing/show_chapters"><i class="far fa-bookmark"></i>  Par Chapitres</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Acheter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forteroche/app/Jean/show"><i class="fas fa-feather"></i> L'auteur</a>
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
                        <a id="admin" class="nav-link" href="/forteroche/app/Write/show"><i class="fas fa-user-cog"></i><span class="gradient">| ADMIN |<span></a>
                    </li>
                    <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                        <button type="submit" class="btn btn-dark" name="disconnect_btn"><i class="fas fa-user-times"></i> Me déconnecter</button>
                        </form>
                    </li>'; } 
                    
                        elseif (isset ($_SESSION['identifiant'])) {
                            echo '
                            <li class="nav-item">
                                <a id="connected" class="nav-link" href="/forteroche/app/User/show"><i class="far fa-user"></i> Mon Espace (<span class="gradient">'.$_SESSION['identifiant'].'</span>)</a> 
                            </li>
                            <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                                <button type="submit" class="btn btn-dark" name="disconnect_btn"><i class="fas fa-user-times"></i> Me déconnecter</button>
                                </form>
                            </li>'; 

                        }else { echo '
                            <li class="nav-item">
                                <a id="connect" class="nav-link" href="/forteroche/app/Connexion/show"><i class="far fa-user"></i> Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a id="create" class="nav-link" href="/forteroche/app/Create/show"><i class="fas fa-link"></i> S\'inscrire</a>
                            </li>';}
                    ?>
                </ul>

                  <a class="navbar-brand" href='/forteroche/app/Home/show'><img src="/forteroche/public/img/book.png" alt="logo d'un livre écrit par forteroche" id="book-logo"></a>
                  <!-- BARRE DE RECHERCHE AJAX -->
              <!-- <div class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" name ='search' id='search' placeholder="Recherche.." aria-label="Recherche">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
              
              </div> -->
            </div>
      	</nav>

        <section class="container cont">

            <h1 class="display-4 tchat-title gradient m-4" style="line-height : 100px"> <?= $h1 ?> </h1>
            <h2 class="lead tchat-sub"> <?= $h2 ?> </h2>

            <?= $content ?>

        </section>

        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <footer class="page-footer font-small cyan darken-3">

			<div id="footer" class="footer-copyright text-center py-3">
			    <p> © Copyright 2019 - All rights reserved | <span class="p4">PROJET4 AMIR</span> | Développeur Web Junior</p>
			</div>

		</footer>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
            crossorigin="anonymous"></script>
        <script src="/forteroche/public/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

    </body>
</html>
