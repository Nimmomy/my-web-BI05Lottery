<?php
$servername = "localhost";
$username = "root";  // ชื่อผู้ใช้ MySQL ของคุณ
$password = "";      // รหัสผ่าน MySQL ของคุณ (ถ้ามี)
$dbname = "new_admin";  // ชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ตั้งค่า charset เป็น utf8
mysqli_set_charset($conn, "utf8");
?>