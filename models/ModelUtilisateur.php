<?php
require_once __DIR__ . '/../BD.php'; 

class UserModel {
    private $db;
    private $nom_ut;
    private $email;
    private $password;
    private $role;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Setters
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = password_hash($password, PASSWORD_DEFAULT); }
    public function setRole($role) { $this->role = $role; }
    public function setNomUt($nom_ut) { $this->nom_ut = $nom_ut; }

    // creation compte
    public function register() {
        $stmt = $this->db->prepare("INSERT INTO utilisateurs (email, password, role, nom_ut, date_inscription) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$this->email, $this->password, $this->role, $this->nom_ut]);
    }

    // filtrer par mail
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function login($email, $password) {
        $user = $this->findByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Success
        } else {
            return false; 
        }
    }
}
?>