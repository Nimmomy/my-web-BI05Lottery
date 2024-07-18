<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Random Page</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/process_selection.css">
    <link rel="icon" href="img/logo-1.ico">
    
    <script>
        function handleConfirm(event) {
            event.preventDefault();

            var amount = document.getElementById("amount").value;

            if (amount === "" || parseInt(amount) <= 0) {
                alert("กรุณากรอกจำนวนเงินที่ต้องการลงทุนให้ถูกต้อง");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "process_lottery.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send("amount=" + amount);
        }
        
        function toggleDetails() {
            const detailsContainer = document.getElementById('detailsContainer');
            const showDetailsBtn = document.getElementById('showDetailsBtn');
            if (detailsContainer.style.display === 'none') {
                detailsContainer.style.display = 'block';
                showDetailsBtn.textContent = 'ซ่อนผลการลงทุน';
            } else {
                detailsContainer.style.display = 'none';
                showDetailsBtn.textContent = 'แสดงผลการลงทุน';
            }
        }
        function toggleVisibility(id) {
            var element = document.getElementById(id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
        
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="head">
            <img href="#" src="img/Head.jpg">
            <div class="logo-2">
                <a href="/BI05_LOTTERY/index.php"><img src="img/Logo.png" alt="Logo"></a>
            </div>
            <div class="menu-2">
                <ul id="menu-2">
                    <li><a href="type.php">ทดลองลงทุน</a></li>
                    <li><a href="topic.php">บทความ</a></li>
                </ul>
            </div>
        </div>

        <div class="byeglo">
            <h1>สลากกินแบ่งรัฐบาล</h1>

            <form onsubmit="handleConfirm(event)" method="POST">
                <div class="group-form">
                    <label for="amount">จำนวนเงินที่ลงทุน (บาท)</label>
                    <input id="amount" class="form-amount" type="number" value="0" name="amount" required>
                </div>
                <div class="box5">
                    <button type="submit" class="button">ยืนยัน</button>
                </div>
            </form>
            
            <div id="result"></div>

        </div>

    </div>
</body>
</html>
