<?php include __DIR__ . '/../partials/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Add Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<main class="container mt-5">
    <h1 class="text-center">Liste des Clubs</h1>
    <div class="row">
        <?php foreach ($clubs as $club): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= htmlspecialchars($club['logo_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($club['nom_club']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($club['nom_club']) ?></h5>
                        <p><strong>Date de création:</strong> <?= htmlspecialchars($club['date_creation']) ?></p>
                        
                        <!-- Social Media Links (Facebook & Instagram) -->
                        <div>
                            <?php
                            $socialLinks = explode(',', $club['reseaux_sociaux']); // Assuming reseaux_sociaux contains comma-separated URLs
                            ?>
                            <?php if (in_array('facebook', $socialLinks)): ?>
                                <a href="<?= htmlspecialchars($socialLinks[array_search('facebook', $socialLinks)]) ?>" target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-facebook"></i> Facebook
                                </a>
                            <?php endif; ?>

                            <?php if (in_array('instagram', $socialLinks)): ?>
                                <a href="<?= htmlspecialchars($socialLinks[array_search('instagram', $socialLinks)]) ?>" target="_blank" class="btn btn-outline-danger">
                                    <i class="bi bi-instagram"></i> Instagram
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Update the "Voir plus" button to redirect to login.php -->
                        <a href="/gestion_clubs/views/user/login.php" class="btn btn-primary mt-2">Voir plus</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
