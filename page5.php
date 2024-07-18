<?php
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="en">
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Savings Bank Lottery</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/process_gsb.css">
    <link rel="icon" href="img/logo-1.ico">
    <style>
        .byegsb h1{
            font-family: 'IBM Plex Sans Thai', sans-serif;
            font-weight: bold;
            font-size: 45px;
            color: #ffffff;
            text-align: center;
            margin: 50px 400px;
            float: right;
        }
    </style>
    <script>
        function handleConfirm(event) {
            event.preventDefault();

            var amount = document.getElementById("amount").value;

            if (amount === "" || parseInt(amount) <= 0) {
                alert("กรุณากรอกจำนวนเงินที่ต้องการลงทุนให้ถูกต้อง");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "process_gsb4.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.send("amount=" + amount);
        }

        function toggleDetails() {
            var resultsContainer = document.getElementById('investmentResultsContainer');
            var showDetailsBtn = document.getElementById('showDetailsBtn');
            if (resultsContainer.style.display === 'none') {
                resultsContainer.style.display = 'block';
                showDetailsBtn.textContent = 'ซ่อนผลการลงทุน';
            } else {
                resultsContainer.style.display = 'none';
                showDetailsBtn.textContent = 'ผลการลงทุน';
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
                <a href="index.php"><img src="img/Logo.png"></a>
            </div>
            <div class="menu-2">
                <ul id="menu-2">
                    <li><a href="type.php">ทดลองลงทุน</a></li>
                    <li><a href="admin_backup/topic.php">บทความ</a></li>
                </ul>
            </div>
        </div>
        <div class="byegsb">
            <h1>สลากออมสินพิเศษดิจิทัล 2 ปี</h1>
            <form onsubmit="handleConfirm(event)">
                <div class="group-form-3">
                    <label for="amount">จำนวนเงินที่ลงทุน (บาท)</label>
                    <input id="amount" class="form-amount-3" type="number" value="0" name="amount">
                </div>
                <div class="box6">
                    <button type="submit" class="button">ยืนยัน</button>
                </div>
            </form>
            <div id="result"></div>
        </div>

    </div>
</body>
</html>