<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css" integrity="sha512-KOWhIs2d8WrPgR4lTaFgxI35LLOp5PRki/DxQvb7mlP29YZ5iJ5v8tiLWF7JLk5nDBlgPP1gHzw96cZ77oD7zQ==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo-1.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.5.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix/dist/notiflix-3.2.5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.5/dist/notiflix-aio-3.2.5.min.js"></script>
    <link rel="stylesheet" href="./css/style_admin_login.css">
</head>
<body>
    <header>
        
    </header>
    <div class="header1">
        <h2>Login Admin</h2>
        <form action="login_db.php" method="post">
            <div class="input-label">
                <label for="username">Username:</label>
            </div>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username...">
            </div>
            <div class="input-label">
                <label for="password">Password:</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password...">
                <i class="far fa-eye-slash" onclick="togglePassword()" style="cursor: pointer;"></i>
            </div>
            <script>
                var passwordInput = document.getElementById('password');
                var eyeIcon = document.querySelector('.fa-eye-slash');

                function togglePassword() {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    } else {
                        passwordInput.type = "password";
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    }
                }
            </script>
            <div class="input-group">
                <button type="submit" name="login_user" class="btn">เข้าสู่ระบบ</button> 
            </div>
            <p> ยังไม่ได้เป็นสมาชิกใช่ไหม? <a href="admin_register.php"> สมัครสมาชิก </a></p>
        </form>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_SESSION['success'])) : ?>
            Notiflix.Report.success(
                'เข้าสู่ระบบสำเร็จ',
                'คุณเข้าสู่ระบบเรียบร้อยแล้ว',
                'ตกลง',
                function() {
                    window.location.href = 'admin_home.php';
                }
            );
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])) : ?>
            Notiflix.Report.failure(
                'การเข้าสู่ระบบล้มเหลว',
                '<?php echo $_SESSION['error']; ?>',
                'ตกลง'
            );
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    });
</script>
</body>
</html>