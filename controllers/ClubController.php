<?php
require_once 'models/ClubModel.php';
require_once 'BD.php';

class ClubController {
    private $model;

    public function __construct() {
        $this->model = new ClubModel();
    }

    // Afficher tous les clubs
    public function listClubs() {
        $clubs = $this->model->getAllClubs();
        include('views/club/list.php');
    }

    // Créer un club (club_admins)
    public function createClub() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom_club'];
            $description = $_POST['description'];
            $reseaux_sociaux = $_POST['reseaux_sociaux'];
            $logo_path = $_POST['logo_path'];

            if ($this->model->createClub($nom, $description, $reseaux_sociaux, $logo_path)) {
                header("Location: clubs.php");
                exit;
            }
        }
        include('views/club/create.php');
    }

    // Voir les membres d'un club ( club_admin)
    public function viewClubMembers() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'club_admin') {
            die("Accès refusé !");
        }

        $clubId = $_GET['club_id'];
        $adminId = $_SESSION['user']['id_user'];

        $members = $this->model->getClubMembers($clubId, $adminId);
        if ($members === false) {
            die("Vous n'êtes pas administrateur de ce club !");
        }

        include('views/club/members.php');
    }
}
?>
