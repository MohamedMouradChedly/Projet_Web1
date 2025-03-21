<?php
require_once 'models/ModelDA.php';

class DemandeAdhesionController {
    private $model;

    public function __construct() {
        $this->model = new DemandeAdhesionModel();
    }

    public function createDemande() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'etudiant') {
            die("Accès refusé !");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id_user'];
            $clubId = $_POST['id_club'];
            $cvPath = $_FILES['cv']['name'];

            if ($this->model->createDemande($userId, $clubId, $cvPath)) {
                header("Location: clubs.php");
                exit;
            }
        }
        include('views/demande_adhesion/create.php');
    }

    public function listDemandes() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'club_admin') {
            die("Accès refusé !");
        }

        $clubId = $_GET['club_id'];
        $adminId = $_SESSION['user']['id_user'];

        $demandes = $this->model->getDemandesByClub($clubId, $adminId);
        if ($demandes === false) {
            die("Vous n'êtes pas administrateur de ce club !");
        }

        include('views/demande_adhesion/list.php');
    }

    public function updateStatut() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'club_admin') {
            die("Accès refusé !");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demandeId = $_POST['id_DA'];
            $statut = $_POST['statut'];
            $adminId = $_SESSION['user']['id_user'];

            if ($this->model->updateStatut($demandeId, $statut, $adminId)) {
                header("Location: demandes.php?club_id=" . $_POST['club_id']);
                exit;
            }
        }
    }
}
?>