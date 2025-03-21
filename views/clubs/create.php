<?php include 'C:/wamp64/www/gestion_clubs/views/partials/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<main class="container mt-5">
    <h1 class="text-center">Membres du Club</h1>
    <div class="row">
        <?php foreach ($members as $member): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $member['nom_ut'] ?></h5>
                        <p class="card-text"><?= $member['email'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include '../partials/footer.php'; ?>