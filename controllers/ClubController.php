<?php
session_start(); 
require_once __DIR__ . '/../models/ModelClub.php';

class ClubController {
    private $model;

    public function __construct() {
        $this->model = new ClubModel();
    }

        

    public function viewmembres() {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'club_admin') {
            die("Accès refusé !");
        }

        if (!isset($_GET['club_id'])) {
            die("Club non spécifié !");
        }

        $clubId = $_GET['club_id'];
        $adminId = $_SESSION['user_id'];

        $members = $this->model->getClubMembers($clubId, $adminId);
        if ($members === false) {
            die("Vous n'êtes pas administrateur de ce club !");
        }

        include __DIR__ . '/../views/clubs/members.php'; 
    }
}
?>