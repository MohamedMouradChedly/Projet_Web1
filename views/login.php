<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ESSECT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style personnalisé pour le cadre gris */
        .form-container {
            background-color: #f8f9fa; /* Couleur de fond gris clair */
            padding: 2rem; /* Espacement intérieur */
            border-radius: 10px; /* Bordures arrondies */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
            max-width: 500px; /* Largeur maximale du formulaire */
            width: 100%; /* Largeur relative */
        }

        /* Centrer le formulaire */
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Hauteur de la vue pour centrer verticalement */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">ESSECT Clubs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clubs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulaire de connexion -->
    <div class="center-container">
        <div class="form-container">
            <h2 class="text-center mb-4">Connexion</h2>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>

            <p class="mt-3 text-center"><a href="register.php">Créer un compte</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>