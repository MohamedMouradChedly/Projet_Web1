<?php
require_once 'models/UserModel.php'; 

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

  
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $this->model->setEmail($_POST['email']);
            $this->model->setPassword($_POST['password']);
            $this->model->setRole('etudiant'); // Default role
            $this->model->setNomUt($_POST['nom_ut']);

           
            if ($this->model->register()) {
                $_SESSION['login_success'] = "Registration successful! You can now log in.";
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['login_error'] = "Registration failed. Please try again.";
            }
        }
        include('views/user/register.php');
    }

    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            $user = $this->model->login($email, $password);

            if ($user) {
                
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['nom_ut'] = $user['nom_ut'];

                $_SESSION['login_success'] = "Login successful! Welcome, " . $user['nom_ut'];
                header("Location: profile.php");
                exit;
            } else {
              
                $_SESSION['login_error'] = "Invalid email or password. Please try again.";
            }
        }
        include('views/user/login.php');
    }
}
?>