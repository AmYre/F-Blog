<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title> <?= $title ?> </title>
        <link rel="stylesheet" href="<?php echo $style ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <body class='bg'>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="http://localhost/test/app/home">Jean Forteroche</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/test/app/home"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/test/app/tchat">Le Tchat des Rocheux</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://localhost/test/app/chapters" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lire en ligne
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Par Livres</a>
                            <a class="dropdown-item" href="#">Par Volumes</a>
                            <a class="dropdown-item" href="http://localhost/test/app/listing">Par Chapitres</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Vous aurez aussi la possibilité de laisser un commentaire en fin de lecture</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Acheter les Livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">L'auteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php if (!isset ($_SESSION['identifiant']) ) {
                             echo '<a id="connect" class="nav-link" href="http://localhost/test/app/connexion">Se connecter</a>';
                            }else { echo '<a id="connected" class="nav-link" href="http://localhost/test/app/user">'.$_SESSION['identifiant'].'</a>';} 
                        ?>
                    </li>
                    <li class="nav-item">
                        <a id="create" class="nav-link" href="http://localhost/test/app/create">Devenir Rocheux</a>
                    </li>
                    <li class="nav-item">
                        <a id="admin" class="nav-link" href="http://localhost/test/app/write">ADMIN</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </div>
        </nav>

        <div class="container">
            <h1> <?= $h1 ?> </h1>
            <h2> <?= $h2 ?> </h2>

            <section>

                <?= $content ?>

            </section>
        </div>

        
        <script
  src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
        <script type="text/javascript" src="public/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    </body>
</html>
