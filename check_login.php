<?php
session_start();
// สมมติว่า connect.php มีการสร้างตัวแปร $con ด้วย mysqli object อย่างถูกต้อง
include('connect.php');

// เปิด error ดูก่อน (แนะนำตอนพัฒนา)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ตรวจสอบว่ามีการสร้าง connection สำเร็จหรือไม่
if (!$con) {
    // ควรมีโค้ดจัดการข้อผิดพลาดในการเชื่อมต่อ
    // เช่น: die("Connection failed: " . mysqli_connect_error());
}

// ลบบรรทัดนี้ เพราะใช้ฟังก์ชันเก่าและไม่ได้กำหนด $result
// $row = mysql_fetch_array($result); 
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
$username = trim($_POST['Username'] ?? '');
$password = $_POST['Password'] ?? '';
$login_successful = false; // ตัวแปรสำหรับตรวจสอบสถานะการเข้าสู่ระบบ

// ตรวจสอบค่าว่าง
if (empty($username) || empty($password)) {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'กรอกข้อมูลไม่ครบ!',
            text: 'กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ครบ',
            confirmButtonColor: '#6f42c1'
        }).then(() => { window.history.back(); });
    </script>";
    // ไม่จำเป็นต้องปิด connection ตรงนี้ เพราะยังไม่ได้เริ่มใช้งานจริง
    exit();
}

// ใช้ Prepared Statement เพื่อความปลอดภัย
$stmt = $con->prepare("SELECT ID, Username, Fullname, Password, Status FROM users WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // ไม่พบบัญชี
    $stmt->close(); // ปิด statement ก่อน exit
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ไม่พบบัญชีนี้!',
            text: 'กรุณาตรวจสอบชื่อผู้ใช้อีกครั้ง',
            confirmButtonColor: '#d33'
        }).then(() => { window.history.back(); });
    </script>";
    // ปิด connection (ทางเลือก)
    $con->close();
    exit();
}

$user = $result->fetch_assoc();
$stmt->close(); // ปิด statement ทันทีที่ใช้เสร็จ

// ตรวจรหัสผ่านด้วย password_verify() (ดีมาก)
if (password_verify($password, $user['Password'])) {
    // รหัสผ่านถูกต้อง
    $_SESSION['ID'] = $user['ID'];
    $_SESSION['Username'] = $user['Username'];
    $_SESSION['Fullname'] = $user['Fullname'];
    $_SESSION['Status'] = $user['Status'];
    $login_successful = true;

    // ตรวจสอบระดับผู้ใช้
    if($user['Status'] === 'admin') {
        $_SESSION['Status'] = 'admin';
        $redirect_url = 'admin/index.php';
    } else {
        $_SESSION['Status'] = 'user';
        $redirect_url = 'index.php';
    }

    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'เข้าสู่ระบบสำเร็จ!',
            text: 'ยินดีต้อนรับกลับ, " . addslashes($user['Fullname']) . "',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = '$redirect_url';
        });
    </script>";

} else {
    // รหัสผ่านไม่ถูกต้อง
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'รหัสผ่านไม่ถูกต้อง!',
            text: 'กรุณาลองใหม่อีกครั้ง',
            confirmButtonColor: '#d33'
        }).then(() => { window.history.back(); });
    </script>";
}

// ปิด Connection เมื่อเสร็จสิ้นการทำงานทั้งหมด
if (!$login_successful) {
    // ปิด connection ในกรณีที่เข้าสู่ระบบไม่สำเร็จ หรือเกิดข้อผิดพลาดอื่น ๆ
    // ในกรณีที่เข้าสู่ระบบสำเร็จ หน้าจะถูกเปลี่ยนไปแล้ว (redirect)
    // แต่ถ้าเกิดข้อผิดพลาด PHP ก็จะปิด connection ให้โดยอัตโนมัติอยู่แล้ว
    $con->close();
}

?>
</body>
</html>