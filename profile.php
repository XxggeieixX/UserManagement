<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header("Location: login_form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome | Purple Dream</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background:linear-gradient(135deg, #6f42c1, #b37dff); color:white; min-height:100vh;">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0,0,0,0.2);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Purple Dream</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <span class="navbar-text me-3">
            สวัสดี, <?php echo $_SESSION['Fullname']; ?>
          </span>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-light">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container text-center mt-5">
    <h1>ยินดีต้อนรับ</h1>
    <p>นี่คือหน้าหลักของคุณ</p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>