<?php
require_once __DIR__ . '/../BD.php';

class DemandeAdhesionModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createDemande($userId, $clubId, $cvPath) {
        $stmt = $this->db->prepare("SELECT role FROM utilisateurs WHERE id_user = ?");
        $stmt->execute([$userId]);

        if ($stmt->fetchColumn() !== 'etudiant') {
            return false; 
        }

        $stmt = $this->db->prepare("INSERT INTO demandes_adhesion (id_user, id_club, cv, statut) VALUES (?, ?, ?, 'en_attente')");
        return $stmt->execute([$userId, $clubId, $cvPath]);
    }

    public function getDemandesByClub($clubId, $adminId) {
        $stmt = $this->db->prepare("SELECT * FROM membres_executifs WHERE user_id = ? AND club_id = ?");
        $stmt->execute([$adminId, $clubId]);

        if ($stmt->rowCount() === 0) {
            return false; 
        }

        $stmt = $this->db->prepare("SELECT * FROM demandes_adhesion WHERE id_club = ?");
        $stmt->execute([$clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatut($demandeId, $statut, $adminId) {
        if (!in_array($statut, ['accepte', 'refuse'])) {
            return false; 
        }

        $stmt = $this->db->prepare("SELECT da.id_club FROM demandes_adhesion da JOIN membres_executifs me ON da.id_club = me.club_id WHERE da.id_DA = ? AND me.user_id = ?");
        $stmt->execute([$demandeId, $adminId]);

        if ($stmt->rowCount() === 0) {
            return false; 
        }

        $stmt = $this->db->prepare("UPDATE demandes_adhesion SET statut = ? WHERE id_DA = ?");
        return $stmt->execute([$statut, $demandeId]);
    }
}
?>