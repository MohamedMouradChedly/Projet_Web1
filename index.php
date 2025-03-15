<?php
$loginPage = "login.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - ESSECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script> 
    <style>
        .header-container {
            position: relative;
            text-align: center;
            color: white; 
        }
        .header-text {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">ESSECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#"> À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="club.html"><i class="fas fa-users"></i> Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#"><i class="fas fa-envelope"></i> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="#"><i class="fas fa-book"></i> Formations</a>
                </li>
            </ul>
            <a href="<?php echo $loginPage; ?>" class="btn btn-outline-light fw-bold"><i class="fas fa-sign-in-alt"></i> Connexion / Inscription</a>
        </div>
    </div>
</nav>


    <header class="header-container">
        <img src="image1.jpg" class="img-fluid w-100" style="height: 600px; object-fit: cover;">
        <div class="header-text">
            <h1>Bienvenue à l'ESSECT</h1>
        </div>
    </header>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
