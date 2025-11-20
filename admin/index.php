<?php
session_start();
if (empty($_SESSION['Username'])|| !isset($_SESSION['Status'])|| $_SESSION['Status'] !== 'admin') {
    header('Location: login.php');
    exit();
}
$username = htmlspecialchars($_SESSION['Username'], ENT_QUOTES, 'UTF-8');
$initial = mb_substr($username, 0, 1, 'UTF-8');

echo <<<HTML
<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .navbar-brand { letter-spacing: .4px; }
    .user-badge { display:flex; align-items:center; gap:.6rem; color:#fff; }
    .avatar { width:40px; height:40px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; background:rgba(255,255,255,.18); color:#fff; font-weight:700; font-size:1rem; }
    .btn-logout { min-width:90px; }
</style>
<title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Welcome Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only"></span></a>
          <li class="nav-item">
        <a class="nav-link" href="users.php">UserManagement</a>
      </li>
</div>
        <div class="collapse navbar-collapse justify-content-end" id="adminNavbar">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-3">
                    <div class="user-badge">
                        <div class="avatar">{$initial}</div>
                        <div class="d-none d-sm-block">
                            <small class="text-white-50">Signed in as</small>
                            <div class="fw-semibold">{$username}</div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-logout" href="../logout.php" role="button">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <!-- เนื้อหาแอดมิน -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
HTML;

?>