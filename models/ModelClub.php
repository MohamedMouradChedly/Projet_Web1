<?php
require_once 'BD.php';

class ClubModel {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    

    
    public function getmembres($clubId) {
        $stmt = $this->db->prepare("
            SELECT u.id_user, u.nom_ut, u.email 
            FROM utilisateurs u 
            INNER JOIN membres_club mc ON u.id_user = mc.user_id 
            WHERE mc.club_id = ?
        ");
        $stmt->execute([$clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // DA
    public function getdemandes($clubId) {
        $stmt = $this->db->prepare("
            SELECT u.id_user, u.nom_ut, u.email 
            FROM utilisateurs u 
            INNER JOIN demande_adhesion da ON u.id_user = da.user_id 
            WHERE da.club_id = ? AND da.status = 'en attente'
        ");
        $stmt->execute([$clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Accepter
    public function acceptMembershipRequest($userId, $clubId) {
        // ajout à membre_clubs
        $stmt = $this->db->prepare("INSERT INTO membres_club (user_id, club_id) VALUES (?, ?)");
        $stmt->execute([$userId, $clubId]);

        // supp
        $stmt = $this->db->prepare("DELETE FROM demande_adhesion WHERE user_id = ? AND club_id = ?");
        return $stmt->execute([$userId, $clubId]);
    }

    // Rejeter
    public function rejectMembershipRequest($userId, $clubId) {
        $stmt = $this->db->prepare("DELETE FROM demande_adhesion WHERE user_id = ? AND club_id = ?");
        return $stmt->execute([$userId, $clubId]);
    }
}
?>
