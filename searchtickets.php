<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Tickets</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/searchtickets.css">
    <link rel="icon" href="img/logo-1.ico">

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
        <div class="byeglo2">
            <h1>สลากกินแบ่งรัฐบาล</h1>

            <?php
            $search_choice = isset($_POST['state']) ? $_POST['state'] : '';
            $number1 = isset($_POST['number1']) ? $_POST['number1'] : '';
            $number2 = isset($_POST['number2']) ? $_POST['number2'] : '';
            $number3 = isset($_POST['number3']) ? $_POST['number3'] : '';
            $number4 = isset($_POST['number4']) ? $_POST['number4'] : '';
            $number5 = isset($_POST['number5']) ? $_POST['number5'] : '';
            $number6 = isset($_POST['number6']) ? $_POST['number6'] : '';
            ?>

            <form id="lotteryForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="group-form-4">
                    <label for="state">ค้นหาเลขจาก</label>
                    <select id="state" class="form-amount-4" required name="state">
                        <option value="" <?php echo $search_choice == '' ? 'selected' : ''; ?>>เลือก</option>
                        <option value="1" <?php echo $search_choice == '1' ? 'selected' : ''; ?>>ค้นหาเลขหน้า 3 ตัว</option>
                        <option value="2" <?php echo $search_choice == '2' ? 'selected' : ''; ?>>ค้นหาเลขท้าย 3 ตัว</option>
                        <option value="3" <?php echo $search_choice == '3' ? 'selected' : ''; ?>>ค้นหาเลขท้าย 2 ตัว</option>
                    </select>
                </div>
                
                <div id="numberInputs" class="number-inputs" style="display: <?php echo $search_choice ? 'block' : 'none'; ?>;">
                    <label for="number1" class="number-input"><input type="text" id="number1" name="number1" maxlength="1" value="<?php echo $number1; ?>" <?php echo $search_choice == '1' ? '' : 'disabled'; ?>></label>
                    <label for="number2" class="number-input"><input type="text" id="number2" name="number2" maxlength="1" value="<?php echo $number2; ?>" <?php echo $search_choice == '1' ? '' : 'disabled'; ?>></label>
                    <label for="number3" class="number-input"><input type="text" id="number3" name="number3" maxlength="1" value="<?php echo $number3; ?>" <?php echo $search_choice == '1' ? '' : 'disabled'; ?>></label>
                    <label for="number4" class="number-input"><input type="text" id="number4" name="number4" maxlength="1" value="<?php echo $number4; ?>" <?php echo $search_choice == '2' ? '' : 'disabled'; ?>></label>
                    <label for="number5" class="number-input"><input type="text" id="number5" name="number5" maxlength="1" value="<?php echo $number5; ?>" <?php echo ($search_choice == '2' || $search_choice == '3') ? '' : 'disabled'; ?>></label>
                    <label for="number6" class="number-input"><input type="text" id="number6" name="number6" maxlength="1" value="<?php echo $number6; ?>" <?php echo ($search_choice == '2' || $search_choice == '3') ? '' : 'disabled'; ?>></label>
                </div>
                <button id="submitButton" type="submit">ยืนยัน</button>
            </form>

            <div id="ticketModal" class="modal">
                <div class="modal-content">
                    <p>เลขที่เลือก: <span id="selectedNumber"></span></p>
                    <h2>เลือกจำนวนใบ</h2>
                    <input type="number" id="ticketQuantity" min="1" max="10" value="1">
                    <button id="confirmTicket">ยืนยัน</button>
                    <button id="cancelTicket">ยกเลิก</button>
                </div>
            </div>

        </div>
        <?php
            function search_tickets($search_choice, $search_number) {
                $results = [];
                for ($i = 0; $i < 20; $i++) {
                    if ($search_choice == '1') {
                        $results[] = $search_number . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
                    } elseif ($search_choice == '2') {
                        $results[] = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT) . $search_number;
                    } elseif ($search_choice == '3') {
                        $results[] = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT) . $search_number;
                    }
                }
                return $results;
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_choice = $_POST['state'];
                $numbers = [];
            
                if ($search_choice == '1') {
                    $numbers = [$_POST['number1'], $_POST['number2'], $_POST['number3']];
                } elseif ($search_choice == '2') {
                    $numbers = [$_POST['number4'], $_POST['number5'], $_POST['number6']];
                } elseif ($search_choice == '3') {
                    $numbers = [$_POST['number5'], $_POST['number6']];
                }
            
                $numbers = array_filter($numbers);  // Remove empty values
            
                if ((($search_choice == '1' || $search_choice == '2') && count($numbers) === 3) || ($search_choice == '3' && count($numbers) === 2)) {
                    $search_number = implode('', $numbers);
                    $matching_tickets = search_tickets($search_choice, $search_number);
            
                    if ($matching_tickets) {
                        echo "<h6>ผลการค้นหา :</h6>";
                        echo '<form method="POST" id="ticketSelectionForm" action="process_selection.php">';
                        echo '<div class="results-container">';

                        foreach ($matching_tickets as $ticket) {
                            echo '<div class="result-box" data-number="' . htmlspecialchars($ticket) . '">';
                            echo "$ticket<br>";
                            echo '<button class="select-button">เลือก</button>';
                            echo '<h7>จำนวน (ใบ) : </h7><span class="quantity-display" style="display:none;"></span>';
                            echo '</div>';
                        }
                    
                        echo '</div>';
                        echo '<h5><label for="num_rounds">จำนวนงวดที่ต้องการซื้อ (1-24): </label></h5>';
                        echo '<input type="number" id="num_rounds" name="num_rounds" min="1" max="24" class="custom-input" required>';
                        echo '<input type="hidden" id="selectedTicketsData" name="selectedTicketsData" value="">';
                        echo '<input type="hidden" id="numRounds" name="numRounds" value="">';
                        echo '<div class="box"><button type="submit" id="confirmSelection">ยืนยันการเลือก</button></div>';
                        echo '</form>';
                    } else {
                        echo "ไม่พบเลขที่ตรงกับเงื่อนไข";
                    }
                    
                } else {
                   
                }
            }
            
        ?>
            
    </div>

    <script>
        document.getElementById('state').addEventListener('change', function() {
            var selectedValue = this.value;
            var numberInputsDiv = document.getElementById('numberInputs');
            var numberInputs = document.querySelectorAll('.number-input input');
            var submitButton = document.getElementById('submitButton');
            
            if (selectedValue) {
                numberInputsDiv.style.display = 'block';
                numberInputs.forEach(input => input.disabled = true);
                submitButton.disabled = true;

                if (selectedValue == '1') {
                    document.getElementById('number1').disabled = false;
                    document.getElementById('number2').disabled = false;
                    document.getElementById('number3').disabled = false;
                } else if (selectedValue == '2') {
                    document.getElementById('number4').disabled = false;
                    document.getElementById('number5').disabled = false;
                    document.getElementById('number6').disabled = false;
                } else if (selectedValue == '3') {
                    document.getElementById('number5').disabled = false;
                    document.getElementById('number6').disabled = false;
                }

                submitButton.disabled = false;
            } else {
                numberInputsDiv.style.display = 'none';
            }
        });

        document.getElementById('lotteryForm').addEventListener('submit', function(event) {
            event.preventDefault(); // ป้องกันการส่งฟอร์มโดยตรง
            
            var selectedValue = document.getElementById('state').value;
            var isValid = true;
            var errorMessage = "";

            if (!selectedValue) {
                errorMessage = "กรุณาเลือกประเภทการค้นหา";
                isValid = false;
            } else {
                var requiredInputs = [];
                if (selectedValue == '1') {
                    requiredInputs = ['number1', 'number2', 'number3'];
                } else if (selectedValue == '2') {
                    requiredInputs = ['number4', 'number5', 'number6'];
                } else if (selectedValue == '3') {
                    requiredInputs = ['number5', 'number6'];
                }

                for (var i = 0; i < requiredInputs.length; i++) {
                    if (!document.getElementById(requiredInputs[i]).value) {
                        errorMessage = "กรุณากรอกเลขให้ครบถ้วน";
                        isValid = false;
                        break;
                    }
                }
            }

            if (!isValid) {
                alert(errorMessage);
            } else {
                this.submit(); // ส่งฟอร์มเมื่อข้อมูลถูกต้อง
            }
        });

        let selectedTickets = new Map();
        const modal = document.getElementById('ticketModal');
        const selectedNumberSpan = document.getElementById('selectedNumber');
        const ticketQuantityInput = document.getElementById('ticketQuantity');

        const modalContent = document.querySelector('.modal-content');
        const confirmTicketButton = document.getElementById('confirmTicket');
        const cancelTicketButton = document.getElementById('cancelTicket');
        let currentSelectedBox = null;

        document.querySelectorAll('.select-button').forEach(button => {
            button.addEventListener('click', function() {
                const box = this.closest('.result-box');
                const ticketNumber = box.getAttribute('data-number');
                currentSelectedBox = box;
                selectedNumberSpan.textContent = ticketNumber;
                ticketQuantityInput.value = selectedTickets.has(ticketNumber) ? selectedTickets.get(ticketNumber) : 1;
                modal.style.display = 'block';
            });
        });

        document.getElementById('confirmTicket').addEventListener('click', function() {
            const ticketNumber = selectedNumberSpan.textContent;
            const quantity = parseInt(ticketQuantityInput.value);
            if (quantity > 0 && quantity <= 10) {
                selectedTickets.set(ticketNumber, quantity);
                updateBoxAppearance(currentSelectedBox, true, quantity);
                modal.style.display = 'none';
            } else {
                alert('กรุณาระบุจำนวนใบระหว่าง 1 ถึง 10');
            }
        });

        document.getElementById('cancelTicket').addEventListener('click', function() {
            const ticketNumber = selectedNumberSpan.textContent;
            selectedTickets.delete(ticketNumber);
            updateBoxAppearance(currentSelectedBox, false, 0);
            modal.style.display = 'none';
        });

        document.getElementById('confirmSelection').addEventListener('click', function(event) {
            event.preventDefault();
            if (selectedTickets.size === 0) {
                alert('กรุณาเลือกเลขอย่างน้อย 1 ใบ');
            } else {
                const selectedTicketsArray = Array.from(selectedTickets.entries()).map(([number, quantity]) => ({ number, quantity }));
                document.getElementById('selectedTicketsData').value = JSON.stringify(selectedTicketsArray);
                document.getElementById('numRounds').value = document.getElementById('num_rounds').value;
                document.getElementById('ticketSelectionForm').submit();
            }
        });

        function updateBoxAppearance(box, isSelected, quantity) {
            const selectButton = box.querySelector('.select-button');
            const quantityDisplay = box.querySelector('.quantity-display');
            
            if (isSelected) {
                box.classList.add('selected');
                selectButton.textContent = 'แก้ไข';
                quantityDisplay.textContent = quantity;
                quantityDisplay.style.display = 'inline-block';
            } else {
                box.classList.remove('selected');
                selectButton.textContent = 'เลือก';
                quantityDisplay.style.display = 'none';
            }
        }

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('select-button')) {
                event.preventDefault();
                const ticketNumber = event.target.parentElement.getAttribute('data-number');
                selectedNumberSpan.textContent = ticketNumber;
                ticketQuantityInput.value = selectedTickets.has(ticketNumber) ? selectedTickets.get(ticketNumber) : 1;
                modal.style.display = 'block';

                confirmTicketButton.onclick = function() {
                    const quantity = parseInt(ticketQuantityInput.value);
                    selectedTickets.set(ticketNumber, quantity);
                    updateQuantityDisplay(event.target.parentElement, quantity);
                    modal.style.display = 'none';
                };

                cancelTicketButton.onclick = function() {
                    modal.style.display = 'none';
                };
            }
        });

        function updateQuantityDisplay(ticketElement, quantity) {
            const quantityDisplay = ticketElement.querySelector('.quantity-display');
            quantityDisplay.textContent = quantity;
            quantityDisplay.style.display = quantity > 0 ? 'inline-block' : 'none';
        }

        document.getElementById('ticketSelectionForm').addEventListener('submit', function(event) {
            if (selectedTickets.size === 0) {
                alert('กรุณาเลือกหมายเลขอย่างน้อย 1 ใบ');
                event.preventDefault();
            } else {
                const selectedTicketsArray = Array.from(selectedTickets.entries()).map(([number, quantity]) => ({ number, quantity }));
                const selectedTicketsInput = document.createElement('input');
                selectedTicketsInput.type = 'hidden';
                selectedTicketsInput.name = 'selectedTickets';
                selectedTicketsInput.value = JSON.stringify(selectedTicketsArray);
                this.appendChild(selectedTicketsInput);
            }
        });

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
        
        document.addEventListener('DOMContentLoaded', function() {
            var stateSelect = document.getElementById('state');
            var numberInputs = document.querySelectorAll('.number-input input');
            var submitButton = document.getElementById('submitButton');
            var numberInputsDiv = document.getElementById('numberInputs');

            // ฟังก์ชันสำหรับการอัปเดตการแสดงผลของ input fields
            function updateInputFields() {
                var selectedValue = stateSelect.value;
                numberInputsDiv.style.display = selectedValue ? 'block' : 'none';
                numberInputs.forEach(input => input.disabled = true);

                if (selectedValue == '1') {
                    document.getElementById('number1').disabled = false;
                    document.getElementById('number2').disabled = false;
                    document.getElementById('number3').disabled = false;
                } else if (selectedValue == '2') {
                    document.getElementById('number4').disabled = false;
                    document.getElementById('number5').disabled = false;
                    document.getElementById('number6').disabled = false;
                } else if (selectedValue == '3') {
                    document.getElementById('number5').disabled = false;
                    document.getElementById('number6').disabled = false;
                }

                submitButton.disabled = !selectedValue;
            }

            // เรียกใช้ฟังก์ชันเมื่อหน้าเว็บโหลด
            updateInputFields();

            // เพิ่ม event listener สำหรับการเปลี่ยนแปลงใน select
            stateSelect.addEventListener('change', updateInputFields);
        });

        document.getElementById('num_rounds').addEventListener('input', function() {
            var value = parseInt(this.value);
            if (value < 1) {
                this.value = 1;
            } else if (value > 24) {
                this.value = 24;
            }
        });

        document.getElementById('ticketSelectionForm').addEventListener('submit', function(event) {
            var numRounds = document.getElementById('num_rounds').value;
            if (numRounds < 1 || numRounds > 24) {
                event.preventDefault();
                alert('กรุณากรอกจำนวนงวดระหว่าง 1 ถึง 24');
            }
        });

    </script>
</body>
</html>