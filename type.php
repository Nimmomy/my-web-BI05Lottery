<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Page</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="img/logo-1.ico">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // เพิ่ม event listener สำหรับปุ่ม "ยืนยัน"
            document.getElementById('confirmButton').addEventListener('click', function(event) {
                event.preventDefault(); // หยุดการทำงานของลิงก์

                var selectElement = document.getElementById('state'); // ดึงข้อมูลจาก dropdown
                var selectedValue = selectElement.value; // ค่าที่ถูกเลือก

                // ตรวจสอบค่าที่ถูกเลือกแล้ว redirect ไปยังหน้าที่ต้องการ
                if (selectedValue === '1') {
                    window.location.href = 'page1.php'; // ลิงก์ไปยังหน้าที่ 1 สลากกินแบ่งรัฐบาล
                } else if (selectedValue === '2') {
                    window.location.href = 'page2.php'; // ลิงก์ไปยังหน้าที่ 2 สลากออมสินพิเศษ 1 ปี
                } else if (selectedValue === '3') {
                    window.location.href = 'page3.php'; // ลิงก์ไปยังหน้าที่ 3 สลากออมสินพิเศษดิจิทัล 1 ปี
                } else if (selectedValue === '4') {
                    window.location.href = 'page4.php'; // ลิงก์ไปยังหน้าที่ 4 สลากออมสินพิเศษ 2 ปี
                } else if (selectedValue === '5') {
                    window.location.href = 'page5.php'; // ลิงก์ไปยังหน้าที่ 5 สลากออมสินพิเศษดิจิทัล 2 ปี
                } else {
                    // ถ้าไม่เลือกอะไรเลยให้แสดง Alert
                    alert('กรุณาเลือกประเภทการลงทุน (สลาก) ก่อน');
                }
            });
        });
    </script>

</head>
<body>
    <div class="wrapper">
        <div class="banner">
            <img href="#" src="img/Background-2.jpg">
            <div class="logo">
                <a href="index.php"><img src="img/Logo.png"></a>
            </div>
            <div class="menu">
                <ul id="menu">
                    <li><a href="type.php">ทดลองลงทุน</a></li>
                    <li><a href="admin_backup/topic.php">บทความ</a></li>
                </ul>
            </div>
        </div>

        <div class="box_type">
            <h1>จำลองการลงทุน</h1>
            <div class="group-form-2">
                <label for="username">ประเภทการลงทุน (สลาก)</label>
                <select id="state" class="form-amount-2" required name="username">
                    <option value="">เลือก</option>
                    <option value="1"> สลากกินแบ่งรัฐบาล </option>
                    <option value="2"> สลากออมสินพิเศษ 1 ปี </option>
                    <option value="3"> สลากออมสินพิเศษดิจิทัล 1 ปี </option>
                    <option value="4"> สลากออมสินพิเศษ 2 ปี </option>
                    <option value="5"> สลากออมสินพิเศษดิจิทัล 2 ปี </option>
                </select>

            </div>

            <div class="box2">
                <button id="confirmButton" class="button">ยืนยัน</button>
            </div>

        </div>

    </div>
</body>
</html>