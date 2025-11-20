<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Purple Dream</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles.css">
  <style>
    /* พื้นหลังแบบ gradient + ภาพภูเขา */
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  background: url('BG.jpg') no-repeat center center fixed;
  background-size: cover; /* <— ให้ครอบจอพอดีแบบไม่ซูมเกิน */
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Prompt', sans-serif;
}


/* กล่อง login โปร่งใส */
.login-box {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(12px);
  border-radius: 25px;
  padding: 70px 60px;      
  width: 100%;
  max-width: 520px;        
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
  animation: fadeIn 1s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* กล่อง input */
.input-group-text {
  background: rgba(255, 255, 255, 0.2);
  border: none;
  color: #fff;
}

.form-control {
  background: rgba(255, 255, 255, 0.15);
  border: none;
  color: #fff;
}

.form-control::placeholder {
  color: rgba(255, 255, 255, 0.7);
}

.form-control:focus {
  background: rgba(255, 255, 255, 0.25);
  box-shadow: none;
  color: #fff;
}

/* ปุ่ม login */
.btn-login {
  background: white;
  color: #5a00aa;
  border-radius: 30px;
  padding: 10px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-login:hover {
  background: #d6b1ff;
  transform: scale(1.03);
}

a {
  transition: color 0.2s;
}

a:hover {
  color: #ffccff !important;
}
/* ===== Input bounce effect ===== */
@keyframes bounceFocus {
  0%   { transform: scale(1); }
  40%  { transform: scale(1.05); }
  60%  { transform: scale(0.98); }
  80%  { transform: scale(1.02); }
  100% { transform: scale(1); }
}

/* เมื่อโฟกัสที่ช่องกรอก */
.input-group:focus-within {
  animation: bounceFocus 0.4s ease;
}

/* เพิ่ม glow effect เวลา focus */
.form-control:focus {
  background: rgba(255, 255, 255, 0.25);
  box-shadow: 0 0 10px rgba(180, 130, 255, 0.7);
  color: #fff;
}
  </style>
</head>
<body>

  <div class="login-wrapper">
    <div class="login-box">
      <h3 class="text-center mb-4 text-white fw-bold">Login</h3>
      <form action="check_login.php" method="POST">
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input name="Username" type="text" class="form-control" id="username" placeholder="Username" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input name="Password" type="password" class="form-control" id="password" placeholder="Password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3 text-white small">
          <div>
            <input type="checkbox" id="rememberMe">
            <label for="rememberMe">Remember me</label>
          </div>
          <a href="#" class="text-white-50 text-decoration-none">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-login w-100">Login</button>
      </form>

      <p class="text-center text-white mt-4 mb-0">
  Don't have an account? <a href="register_form.php" class="text-white fw-semibold">Register</a>
</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
