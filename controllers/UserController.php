<?php
require_once 'models/UserModel.php';
require_once 'BD.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    // creation compte
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new UserModel();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setRole('etudiant'); // Default role
            $user->setNomUt($_POST['nom_ut']);

            if ($user->register()) {
                header("Location: login.php");
                exit;
            }
        }
        include('views/user/register.php');
    }

    //  login
    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->model->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: profile.php");
                exit;
            }
        }
        include('views/user/login.php');
    }
}
?>
