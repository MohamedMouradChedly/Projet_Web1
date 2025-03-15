<?php
require_once __DIR__ . '/../BD.php';
class ClubModel {
    private $db;
    private $id_club;
    private $nom_club;
    private $description;
    private $date_creation;
    private $reseaux_sociaux;
    private $logo_path;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Récupérer tous les clubs
    public function getAllClubs() {
        $stmt = $this->db->query("SELECT * FROM clubs");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Créer un club (club_admin)
    public function createClub($nom, $description, $reseaux_sociaux, $logo_path) {
        $stmt = $this->db->prepare("INSERT INTO clubs (nom_club, description, date_creation, reseaux_sociaux, logo_path) VALUES (?, ?, NOW(), ?, ?)");
        return $stmt->execute([$nom, $description, $reseaux_sociaux, $logo_path]);
    }

    // Récupérer les membres d'un club spécifique (club_admin)
    public function getClubMembers($clubId, $adminId) {
        // Vérifier si l'utilisateur est admin du club
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE id_user = ? AND role = 'club_admin' AND id_user IN (SELECT user_id FROM membres_executifs WHERE club_id = ?)");
        $stmt->execute([$adminId, $clubId]);

        if ($stmt->rowCount() === 0) {
            return false; // L'utilisateur n'est pas admin de ce club
        }

        // Récupérer les membres du club
        $stmt = $this->db->prepare("SELECT u.id_user, u.nom_ut, u.email FROM utilisateurs u INNER JOIN membres_club mc ON u.id_user = mc.user_id WHERE mc.club_id = ?");
        $stmt->execute([$clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
