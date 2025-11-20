<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Purple Dream</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: url('BG.jpg') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Prompt', sans-serif;
    }

    .register-box {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(12px);
      border-radius: 25px;
      padding: 60px;
      width: 100%;
      max-width: 520px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
      color: white;
    }

    .btn-register {
      background: white;
      color: #5a00aa;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-register:hover {
      background: #d6b1ff;
      transform: scale(1.03);
    }

  </style>
</head>
<body>
  <div class="register-box">
    <h3 class="text-center mb-4 fw-bold">Create Account</h3>

    <form action="register_save.php" method="POST">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Full name</label>
        <input type="text" name="fullname" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-register w-100">Register</button>
    </form>

    <p class="text-center mt-3">
      Already have an account? <a href="login.php" class="text-white fw-semibold">Login</a>
    </p>
  </div>
</body>
</html>
