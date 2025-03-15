<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Informatique - ESSECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            width: 100%;
            height: 400px; 
            object-fit: cover; 
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">ESSECT Clubs</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="club.php">Clubs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <section>
            <h1 class="text-center">Fahmologia</h1>
            <p class="text-muted">Date de création : 25/09/2022</p>
            <p>
                Le Club Informatique de l'ESSECT est dédié aux passionnés de technologie et de programmation.
                Nous organisons des ateliers, des conférences et des projets pour développer vos compétences.
            </p>
            
        </section>

        <section class="mt-5">
            <h2 class="text-center">Équipe du Club</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="radiomembre" class="card-img-top" alt="Membre 1">
                        <div class="card-body">
                            <h5 class="card-title">Membre 1</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="radiomembre1" class="card-img-top" alt="Membre 2">
                        <div class="card-body">
                            <h5 class="card-title">Membre 2</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <section class="mt-5">
            <h2>Photos du Club</h2>
            <div id="clubCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#clubCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#clubCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#clubCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#clubCarousel" data-bs-slide-to="3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="radio1" class="d-block w-100" alt="Photo du club 1">
                    </div>
                    <div class="carousel-item">
                        <img src="radio2" class="d-block w-100" alt="Photo du club 2">
                    </div>
                    <div class="carousel-item">
                        <img src="radio3" class="d-block w-100" alt="Photo du club 3">
                    </div>
                    <div class="carousel-item">
                        <img src="radio4" class="d-block w-100" alt="Photo du club 4">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#clubCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#clubCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>

       

        <section class="mt-5">
            <h2>Postuler au Club</h2>
            <a href="formulaire1.html" class="btn btn-secondary">Postuler</a>
        </section>
    </main>

    <footer class="bg-light text-center py-4 mt-5">
        <p>&copy; 2023 ESSECT Clubs. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
