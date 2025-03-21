<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if the user is not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - ESSECT</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/gestion_clubs/assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'C:/wamp64/www/gestion_clubs/views/partials/header.php'; ?>

    <main class="container mt-5">
        <div class="header-container">
            <img src="assets/images/image1.jpg" class="img-fluid w-100" style="height: 600px; object-fit: cover;">
            <div class="header-text">
                <h1>Bienvenue, <?= htmlspecialchars($_SESSION['nom_ut']) ?>!</h1>
                <p class="lead">Explorez nos clubs et participez à nos événements.</p>
            </div>
        </div>
    </main>

    <?php include 'C:/wamp64/www/gestion_clubs/views/partials/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
