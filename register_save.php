<?php
include('connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
$username = trim($_POST['username'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$fullname = trim($_POST['fullname'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// ✅ ตรวจสอบช่องว่าง
if (empty($username) || empty($phone) || empty($fullname) || empty($password) || empty($confirm_password)) {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'ข้อมูลไม่ครบ!',
            text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
            confirmButtonColor: '#6f42c1'
        }).then(() => { window.history.back(); });
    </script>";
    exit();
}

// ✅ ตรวจสอบรหัสผ่านตรงกันไหม
if ($password !== $confirm_password) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'รหัสผ่านไม่ตรงกัน!',
            text: 'กรุณากรอกรหัสผ่านให้ตรงกัน',
            confirmButtonColor: '#d33'
        }).then(() => { window.history.back(); });
    </script>";
    exit();
}

// ✅ ตรวจสอบว่ามี username นี้อยู่แล้วหรือไม่
$stmt = $con->prepare("SELECT * FROM users WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'มีชื่อผู้ใช้นี้แล้ว!',
            text: 'กรุณาใช้ชื่อผู้ใช้อื่น',
            confirmButtonColor: '#d33'
        }).then(() => { window.history.back(); });
    </script>";
    exit();
}
$stmt->close();

// ✅ บันทึกข้อมูลลงฐานข้อมูล (เข้ารหัสรหัสผ่าน)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $con->prepare("INSERT INTO users (Username, Password, Fullname, Phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $hashed_password, $fullname, $phone);

if ($stmt->execute()) {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'สมัครสมาชิกสำเร็จ!',
            text: 'สามารถเข้าสู่ระบบได้แล้ว 💜',
            confirmButtonColor: '#6f42c1',
            timer: 1800,
            showConfirmButton: false
        }).then(() => {
            window.location.href = 'login.php'; // ✅ เปลี่ยนชื่อนี้ให้ตรงกับหน้า Login ของคุณ
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถสมัครสมาชิกได้',
            confirmButtonColor: '#d33'
        }).then(() => { window.history.back(); });
    </script>";
}

$stmt->close();
$con->close();
?>
</body>
</html>
