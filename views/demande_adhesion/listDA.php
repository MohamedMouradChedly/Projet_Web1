<?php include '../partials/header.php'; ?>

<main class="container mt-5">
    <h1 class="text-center">Demandes d'Adhésion</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td><?= $demande['nom_ut'] ?></td>
                    <td><?= $demande['email'] ?></td>
                    <td><?= $demande['statut'] ?></td>
                    <td>
                        <a href="DemandeAdhesionController.php?action=updateStatut&id=<?= $demande['id_DA'] ?>&statut=accepte" class="btn btn-success">Accepter</a>
                        <a href="DemandeAdhesionController.php?action=updateStatut&id=<?= $demande['id_DA'] ?>&statut=refuse" class="btn btn-danger">Refuser</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include '../partials/footer.php'; ?>