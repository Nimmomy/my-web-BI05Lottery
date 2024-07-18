<?php
session_start();
session_destroy(); // ทำลาย session ทั้งหมด

// ส่งผู้ใช้งานกลับไปยังหน้า login
header("Location: admin_login.php");
exit;
?>
