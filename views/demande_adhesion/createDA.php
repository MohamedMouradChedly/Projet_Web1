<?php include '../partials/header.php'; ?>

<div class="center-container">
    <div class="form-container">
        <h2 class="text-center mb-4">Demande d'Adhésion</h2>
        <form action="DemandeAdhesionController.php?action=createDemande" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cv" class="form-label">CV (PDF uniquement) :</label>
                <input type="file" class="form-control" id="cv" name="cv" accept=".pdf" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Envoyer</button>
        </form>
    </div>
</div>

<?php include '../partials/footer.php'; ?>