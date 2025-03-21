<?php
session_start();
require_once '../../models/ModelClub.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'club_admin') {
    header("Location: login.php");
    exit;
}

$clubModel = new ClubModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $clubId = $_POST['club_id'];

    if (isset($_POST['accept'])) {
        $clubModel->acceptMembershipRequest($userId, $clubId);
        $_SESSION['message'] = "L'utilisateur a été accepté.";
    } elseif (isset($_POST['reject'])) {
        $clubModel->rejectMembershipRequest($userId, $clubId);
        $_SESSION['message'] = "L'utilisateur a été rejeté.";
    }
}

header("Location: dashboard_admin.php");
exit;
