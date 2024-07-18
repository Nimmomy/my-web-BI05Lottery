<?php
session_start();
$update_status = ""; // สร้างตัวแปรเพื่อเก็บสถานะการอัปเดต

if (!isset($_SESSION['username'])) {
    // Redirect to login page if session username is not set
    header("Location: admin_login.php");
    exit();
}

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "new_admin");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user data for the logged-in user
$current_username = $_SESSION['username'];
$user_query = "SELECT * FROM users WHERE username='$current_username'";
$user_result = mysqli_query($conn, $user_query);

if (mysqli_num_rows($user_result) == 1) {
    $user = mysqli_fetch_assoc($user_result);
} else {
    echo "Error: User data not found.";
    exit();
}

// Handle form submission for updating user profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $email = $_POST['email'];

    // Check if password is provided for updating
    if (!empty($_POST['password'])) {
        $old_password = $_POST['old_password']; // เพิ่มการรับค่ารหัสผ่านเก่า
        $hashed_old_password = $user['password']; // รหัสผ่านเก่าที่เข้ารหัสแล้วในฐานข้อมูล

        // Verify old password
        if (password_verify($old_password, $hashed_old_password)) {
            // Password matched, proceed with update
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET username='$new_username', email='$email', password='$password' WHERE username='$current_username'";
        } else {
            // Password not matched, show error
            $update_status = "Error: Incorrect old password. Profile update failed.";
        }
    } else {
        // Update without changing password
        $update_query = "UPDATE users SET username='$new_username', email='$email' WHERE username='$current_username'";
    }

    if (empty($update_status)) { // ตรวจสอบว่าไม่มีข้อผิดพลาดรหัสผ่านเก่า
        if (mysqli_query($conn, $update_query)) {
            $update_status = "Profile updated successfully";
            // Update session username if it has been changed
            $_SESSION['username'] = $new_username;
            echo '<script>alert("Profile updated successfully"); window.location.href = "admin_updateprofile.php";</script>'; // Alert เมื่ออัปเดตสำเร็จ
            exit(); // ออกจากการทำงานหลังจากอัปเดตเรียบร้อย
        } else {
            $update_status = "Error updating profile: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_admin_updateprofile.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300;400;500&display=swap" rel="stylesheet">
    <title>อัปเดตข้อมูลผู้ใช้</title>
</head>
<body>
    <div class="container">
        <h2>อัปเดตข้อมูลผู้ใช้</h2>
        <?php if (!empty($update_status)): ?>
            <div class="alert <?php echo strpos($update_status, 'successfully') !== false ? 'success' : ''; ?>">
                <?php echo $update_status; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
            
            <label for="email">อีเมล:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            
            <label for="old_password">รหัสผ่านเก่า:</label>
            <input type="password" id="old_password" name="old_password" required>
            
            <label for="password">รหัสผ่านใหม่ (ถ้าไม่ต้องการเปลี่ยนไม่ต้องกรอก):</label>
            <input type="password" id="password" name="password">
            
            <input type="submit" value="อัปเดตข้อมูล">
        </form>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>






