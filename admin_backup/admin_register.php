<?php
// เชื่อมต่อกับฐานข้อมูล (ตัวอย่างเท่านั้น ควรใช้การเชื่อมต่อที่ปลอดภัยกว่านี้ในการใช้งานจริง)
$conn = mysqli_connect("localhost", "root", "", "new_admin");

$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ตรวจสอบว่ารหัสผ่านและการยืนยันรหัสผ่านตรงกันหรือไม่
    if ($password !== $confirm_password) {
        $status = "password_mismatch";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน
        $role = 'user'; // กำหนดค่าเริ่มต้นของ role เป็น 'user'

        // ตรวจสอบว่า username หรือ email ซ้ำหรือไม่
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($result) > 0) {
            $status = "exists";
        } else {
            // เพิ่มข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
            $insert_query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
            if (mysqli_query($conn, $insert_query)) {
                // ลงทะเบียนสำเร็จ ทำการเปลี่ยนเส้นทางไปยังหน้า admin_login.php
                header("Location: admin_login.php");
                exit();
            } else {
                $status = "error";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_admin_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">
    <title>Register</title>
    
    <script>
        function validateForm() {
            // ตรวจสอบรหัสผ่านและการยืนยันรหัสผ่าน
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            
            if (password !== confirm_password) {
                alert("รหัสผ่านและการยืนยันรหัสผ่านไม่ตรงกัน");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php
        if ($status === "exists") {
            echo "<p style='color:red;'>ชื่อผู้ใช้หรืออีเมลนี้มีอยู่ในระบบแล้ว</p>";
        } elseif ($status === "error") {
            echo "<p style='color:red;'>มีข้อผิดพลาดเกิดขึ้นในขั้นตอนการลงทะเบียน</p>";
        } elseif ($status === "password_mismatch") {
            echo "<p style='color:red;'>รหัสผ่านและการยืนยันรหัสผ่านไม่ตรงกัน</p>";
        } elseif ($status === "success") {
            echo "<p style='color:green;'>ลงทะเบียนสำเร็จ</p>";
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" value="ลงทะเบียน">
        </form>
    </div>
</body>
</html>
