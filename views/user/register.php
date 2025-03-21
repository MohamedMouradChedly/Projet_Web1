<?php include 'C:/wamp64/www/gestion_clubs/views/partials/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="center-container">
    <div class="form-container">
        <h2 class="text-center mb-4">Inscription</h2>
        <form action="UserController.php?action=register" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Adresse email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="nom_ut" class="form-label">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="nom_ut" name="nom_ut" required>
            </div>
            <!-- Role Selection -->
            <div class="mb-3">
                <label for="role" class="form-label">Choisissez un rôle :</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="etudiant" name="role" value="etudiant" required>
                    <label class="form-check-label" for="etudiant">Étudiant</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="club_admin" name="role" value="club_admin" required>
                    <label class="form-check-label" for="club_admin">Administrateur de Club</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
        <p class="mt-3 text-center">Déjà inscrit ? <a href="login.php">Connectez-vous ici</a></p>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
