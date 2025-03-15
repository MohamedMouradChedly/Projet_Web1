<?php
require_once __DIR__ . '/../BD.php';

class DemandeAdhesionModel {
    private $db;
    private $id_DA;
    private $id_user;
    private $id_club;
    private $cv;
    private $statut;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Créer une demande d'adhésion (étudiant uniquement)
    public function createDemande($userId, $clubId, $cvPath) {
        // Vérifier si l'utilisateur est un étudiant
        $stmt = $this->db->prepare("SELECT role FROM utilisateurs WHERE id_user = ?");
        $stmt->execute([$userId]);

        if ($stmt->fetchColumn() !== 'etudiant') {
            return false; // Seuls les étudiants peuvent postuler
        }

        // Insérer la demande d'adhésion
        $stmt = $this->db->prepare("INSERT INTO demandes_adhesion (id_user, id_club, cv, statut) VALUES (?, ?, ?, 'en_attente')");
        return $stmt->execute([$userId, $clubId, $cvPath]);
    }

    // Récupérer les demandes d'un club pour un club_admin
    public function getDemandesByClub($clubId, $adminId) {
        // Vérifier si l'utilisateur est bien un admin du club
        $stmt = $this->db->prepare("SELECT * FROM membres_executifs WHERE user_id = ? AND club_id = ?");
        $stmt->execute([$adminId, $clubId]);

        if ($stmt->rowCount() === 0) {
            return false; // L'utilisateur n'est pas un administrateur de ce club
        }

        // Récupérer toutes les demandes pour ce club
        $stmt = $this->db->prepare("SELECT * FROM demandes_adhesion WHERE id_club = ?");
        $stmt->execute([$clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Accepter ou refuser une demande (club_admin uniquement)
    public function updateStatut($demandeId, $statut, $adminId) {
        if (!in_array($statut, ['accepte', 'refuse'])) {
            return false; // Statut invalide
        }

        // Vérifier si l'admin a le droit de gérer cette demande
        $stmt = $this->db->prepare("SELECT da.id_club FROM demandes_adhesion da JOIN membres_executifs me ON da.id_club = me.club_id WHERE da.id_DA = ? AND me.user_id = ?");
        $stmt->execute([$demandeId, $adminId]);

        if ($stmt->rowCount() === 0) {
            return false; // L'admin ne gère pas cette demande
        }

        // Mettre à jour le statut
        $stmt = $this->db->prepare("UPDATE demandes_adhesion SET statut = ? WHERE id_DA = ?");
        return $stmt->execute([$statut, $demandeId]);
    }
}
?>
