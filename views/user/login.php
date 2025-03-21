<?php include 'C:/wamp64/www/gestion_clubs/views/partials/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="center-container">
    <div class="form-container">
        <h2 class="text-center mb-4">Connexion</h2>

        <!-- Success or Error Message -->
        <?php
        session_start();
        if (isset($_SESSION['login_success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['login_success'] . '</div>';
            unset($_SESSION['login_success']);
        }
        if (isset($_SESSION['login_error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
            unset($_SESSION['login_error']);

        }
        ?>

        <form action="UserController.php?action=login" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
           <button type="submit"  href="gestion_clubs/acceuil.php" class="btn btn-primary w-100">Se connecter</button>
        </form>
        
    </div>
</div>

<?php include '../partials/footer.php'; ?>
