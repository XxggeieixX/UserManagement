<?php
session_start(); // เริ่ม session
session_unset(); // เคลียร์ค่าทั้งหมดใน session
session_destroy(); // ลบ session ทั้งหมดออก

// ✅ แทรก SweetAlert และ redirect กลับไปหน้า login
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'ออกจากระบบสำเร็จ!',
      text: 'กลับไปที่หน้าเข้าสู่ระบบ 💜',
      confirmButtonColor: '#6f42c1',
      timer: 2000,
      showConfirmButton: false
    }).then(() => {
      window.location.href = 'login.php'; // ✅ แก้ชื่อนี้ให้ตรงกับหน้า login ของคุณ
    });
  </script>
</body>
</html>
