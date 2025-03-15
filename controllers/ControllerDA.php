<?php
require_once 'models/ModelDA.php';
require_once 'BD.php';

class DemandeAdhesionController {
    private $model;

    public function __construct() {
        $this->model = new DemandeAdhesionModel();
    }

    // Envoyer une demande d'adhésion (étudiant)
    public function createDemande() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'etudiant') {
            die("Accès refusé !");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id_user'];
            $clubId = $_POST['id_club'];
            $cvPath = $_POST['cv']; // Supposons que le chemin du CV est envoyé

            if ($this->model->createDemande($userId, $clubId, $cvPath)) {
                header("Location: clubs.php");
                exit;
            }
        }
        include('views/demande_adhesion/create.php');
    }

    // Voir les demandes pour un club (club_admin)
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

    // Accepter ou refuser une demande
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
