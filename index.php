<!DOCTYPE html>
<html>
<head>
    <link href="bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Cook & Burn
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Favoris
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
    <header>
        <div class="row">
            <!-- > MD -->
            <div class="headerImg d-md-none d-lg-block ">
                <img src="data/img/header.jpg"/>
            </div>

            <!-- < MD --->
            <div class="headerImgDeux d-none d-md-block d-lg-none ">
                <img src="data/img/header.jpg"/>
            </div>
        </div>
    </header>
    <article>
        <div class="row">
            <div class=" col-sm-12  col-md-6 col-lg-4 recetteDisplay" id="recette1">
                <a href="#" class="herfRecetteDisplay">
                    <img src="data/img/recette%20(3).jpg" />
                    <p>Simplicité</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 recetteDisplay" id="recette2">
                <a href="#" class="herfRecetteDisplay">
                    <img src="data/img/recette%20(3).jpg" />
                    <p>Délicieuse</p>
                </a>
            </div>
            <div class=" col-lg-4 col-md-6 col-sm-12  recetteDisplay" id="recette3">
                <a href="#" class="herfRecetteDisplay">
                    <img src="data/img/recette%20(3).jpg" />
                    <p>Partage</p>
                </a>
            </div>
        </div>
        <div>
            <p> COOK & BURN est un site internet de cuisine, différents internaute partage leurs recettes et donne leurs avis avec les "Burns"</p>
        </div>
    </article>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>