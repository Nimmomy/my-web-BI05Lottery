<?php 
require_once 'db_process_gsb.php';
header('Content-Type: text/html; charset=utf-8');
session_start(); // เริ่ม session เพื่อใช้เก็บข้อมูลตัวแปร
$alphabet = mb_convert_encoding("ABCDEFGHIJKLMNOPQRSTUVWXYZกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮ", 'UTF-8', 'auto');$current_char_index = 0;
$current_number = 0;

// เรียกค่า $current_char_index และ $current_number จาก session หรือกำหนดค่าเริ่มต้น
if (!isset($_SESSION['current_char_index'])) {
    $_SESSION['current_char_index'] = 0;
}
$current_char_index = $_SESSION['current_char_index'];

if (!isset($_SESSION['current_number'])) {
    $_SESSION['current_number'] = 0;
}
$current_number = $_SESSION['current_number'];

function random_number_gsb() {
    global $alphabet, $current_char_index, $current_number;
    
    $chosen_char = $alphabet[$current_char_index];
    $random_number = str_pad($current_number, 7, '0', STR_PAD_LEFT);
    $final_number = $chosen_char . " " . $random_number;
    
    $current_number += 1;
    
    if ($current_number > 9999999) {
        $current_number = 0;
        $current_char_index += 1;
        
        if ($current_char_index >= strlen($alphabet)) {
            $current_char_index = 0;
        }
    }

    // Save the updated values back to the session
    $_SESSION['current_char_index'] = $current_char_index;
    $_SESSION['current_number'] = $current_number;
    
    return $final_number;
}

function prize1_gsb() {
    $percentages_prize1 = [  
        [0, 10.0], [1, 10.1], [2, 8.4], [3, 8.5], [4, 8.2], [5, 8.5], [6, 8.5], [7, 8.3], [8, 10.0], [9, 8.3]
    ];
    
    $letters = mb_str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮ");
    $chosen_char = $letters[array_rand($letters)];
    $random_number = $chosen_char . " ";
    
    for ($i = 0; $i < 7; $i++) {
        $chosen_digit = weighted_random_choice($percentages_prize1);
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function prize2_gsb() {
    $percentages_prize1 = [  
        [0, 8.4], [1, 10.1], [2, 8.4], [3, 8.5], [4, 10.2], [5, 8.5], [6, 8.5], [7, 8.3], [8, 10.0], [9, 8.3]   
    ];
    
    $letters = mb_str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮ");
    $chosen_char = $letters[array_rand($letters)];
    $random_number = $chosen_char . " ";
    
    for ($i = 0; $i < 7; $i++) {
        $chosen_digit = weighted_random_choice($percentages_prize1);
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function prize3_gsb() {
    $percentages_prize3 = [ 
        [0, 8.3], [1, 10.1], [2, 8.2], [3, 8.4], [4, 8.2], [5, 8.2], [6, 9.0], [7, 10.0], [8, 9.1], [9, 10.0]   
    ];
    
    $random_numbers = [];
    for ($i = 0; $i < 5; $i++) {
        $random_number = "";
        for ($j = 0; $j < 7; $j++) {
            $chosen_digit = weighted_random_choice($percentages_prize3);
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function prize4_gsb() {
    $percentages_prize4 = [ 
        [0, 10.2], [1, 9.1], [2, 10.0], [3, 8.4], [4, 10.2], [5, 8.2], [6, 9.0], [7, 8.7], [8, 9.1], [9, 9.0]   
    ];
    
    $random_numbers = [];
    for ($i = 0; $i < 10; $i++) {
        $random_number = "";
        for ($j = 0; $j < 7; $j++) {
            $chosen_digit = weighted_random_choice($percentages_prize4);
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function prize5_gsb() {
    $percentages_prize5 = [ 
        [0, 8.3], [1, 10.3], [2, 8.2], [3, 8.4], [4, 8.2], [5, 8.2], [6, 9.0], [7, 10.2], [8, 9.1], [9, 10.0]   
    ];
    
    $random_numbers = [];
    for ($i = 0; $i < 15; $i++) {
        $random_number = "";
        for ($j = 0; $j < 7; $j++) {
            $chosen_digit = weighted_random_choice($percentages_prize5);
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function last4_gsb() {
    $percentages_last4 = [ 
        [0, 10.2], [1, 8.0], [2, 8.5], [3, 8.5], [4, 8.5], [5, 8.4], [6, 10.5], [7, 8.0], [8, 8.2], [9, 10.0]   
    ];
    
    $random_number = "";
    for ($i = 0; $i < 4; $i++) {
        $chosen_digit = weighted_random_choice($percentages_last4);
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function last3_gsb() {
    $percentages_last3 = [ 
        [0, 10.2], [1, 10.2], [2, 10.2], [3, 8.5], [4, 8.5], [5, 9.0], [6, 8.5], [7, 8.0], [8, 8.7], [9, 8.2]   
    ];
    
    $random_number = "";
    for ($i = 0; $i < 3; $i++) {
        $chosen_digit = weighted_random_choice($percentages_last3);
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function check_gsb_prizes($user_tickets, $prizes) {
    $winning_tickets = [];
    foreach ($user_tickets as $ticket) {
        if (in_array($ticket, $prizes['prize1'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 1'];
        } elseif (in_array($ticket, $prizes['prize2'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 2'];
        } elseif (in_array($ticket, $prizes['prize3'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 3'];
        } elseif (in_array($ticket, $prizes['prize4'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 4'];
        } elseif (in_array($ticket, $prizes['prize5'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 5'];
        } elseif (substr($ticket, -4) === $prizes['last4'][0]) {
            $winning_tickets[] = [$ticket, 'รางวัลเลขท้าย 4 ตัว'];
        } elseif (substr($ticket, -3) === $prizes['last3'][0]) {
            $winning_tickets[] = [$ticket, 'รางวัลเลขท้าย 3 ตัว'];
        }
    }
    return $winning_tickets;
}

function calculate_prize_amount($prize_type) {
    $prize_amounts_gsb = [
        'รางวัลที่ 1' => 1000000,
        'รางวัลที่ 2' => 500000,
        'รางวัลที่ 3' => 200000,
        'รางวัลที่ 4' => 100000,
        'รางวัลที่ 5' => 50000,
        'รางวัลเลขท้าย 4 ตัว' => 200,
        'รางวัลเลขท้าย 3 ตัว' => 40
    ];
    return $prize_amounts_gsb[$prize_type];
}

function calculate_total_prize_gsb($winning_tickets, $investment_amount, $interest_rate, $term_years) {
    $prize_amounts_gsb = [
        'รางวัลที่ 1' => 1000000,
        'รางวัลที่ 2' => 500000,
        'รางวัลที่ 3' => 200000,
        'รางวัลที่ 4' => 100000,
        'รางวัลที่ 5' => 50000,
        'รางวัลเลขท้าย 4 ตัว' => 200,
        'รางวัลเลขท้าย 3 ตัว' => 40
    ];

    $total_prize = 0;
    foreach ($winning_tickets as $ticket_prize) {
        $total_prize += $prize_amounts_gsb[$ticket_prize[1]];
    }

    $interest_earned = $investment_amount * ($interest_rate / 100) * $term_years;
    $total_amount = $total_prize + $interest_earned + $investment_amount;
    
    return [$total_prize, $interest_earned, $total_amount];
}

function calculate_winning_chance($total_tickets, $winning_tickets) {
    if ($total_tickets == 0) {
        return 0;
    }
    return (count($winning_tickets) / $total_tickets) * 100;
}

function calculate_return_on_investment($total_investment, $total_winnings) {
    if ($total_investment == 0) {
        return 0;
    }
    return ($total_winnings / $total_investment) * 100;
}

function weighted_random_choice($weighted_values) {
    $total_weight = array_sum(array_column($weighted_values, 1));
    $random_value = rand(0, $total_weight * 100) / 100;
    foreach ($weighted_values as $value) {
        if ($random_value < $value[1]) {
            return $value[0];
        }
        $random_value -= $value[1];
    }
    return $weighted_values[count($weighted_values) - 1][0];
}

function saveInvestmentResult($conn, $total_investment, $total_winnings, $interest_earned, $total_return) {
    $sql = "INSERT INTO investment_results (total_investment, total_winnings, interest_earned, total_return) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dddd", $total_investment, $total_winnings, $interest_earned, $total_return);
    $result = $stmt->execute();
    if (!$result) {
        error_log("Error saving investment result: " . $stmt->error);
    }
    $stmt->close();
}

function saveWinningTicket($conn, $round, $ticket, $prize_type, $prize_amount) {
    $sql = "INSERT INTO winning_tickets (draw_round, winning_number, prize_type, prize_amount) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Error preparing statement: " . $conn->error);
        return false;
    }
    $stmt->bind_param("issd", $round, $ticket, $prize_type, $prize_amount);
    $result = $stmt->execute();
    if (!$result) {
        error_log("Error executing statement: " . $stmt->error);
        return false;
    }
    $stmt->close();
    return true;
}

function saveLotteryResult($conn, $round, $prize_type, $winning_numbers) {
    // แปลง array ของหมายเลขที่ถูกรางวัลเป็น string
    $winning_numbers_str = is_array($winning_numbers) ? implode(',', $winning_numbers) : $winning_numbers;
    
    $sql = "INSERT INTO lottery_results (draw_round, prize_type, winning_numbers) 
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE winning_numbers = VALUES(winning_numbers)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Error preparing statement: " . $conn->error);
        return false;
    }
    $stmt->bind_param("iss", $round, $prize_type, $winning_numbers_str);
    $result = $stmt->execute();
    if (!$result) {
        error_log("Error executing statement: " . $stmt->error);
        return false;
    }
    $stmt->close();
    return true;
}

// run main process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    global $alphabet, $current_char_index, $current_number;
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮ";
    
    $term_years = 1;
    $interest_rate = 0.25;
    $total_winnings = 0;

    $amount = (int)$_POST['amount'];
    $tickets = intval($amount / 100);  // ticket costs 100 Baht
    $user_tickets = [];

    for ($i = 0; $i < $tickets; $i++) {
        $user_tickets[] = random_number_gsb();
    }
    
    $result = '<h3>สลากออมสินของท่าน</h3>';

    $table = '<div style="width: 1350px; height: 500px; overflow-y: auto; overflow-x: hidden; position: relative;">';
    $table .= '<div style="width: 100%; padding: 10px; text-align: center;">';
    $table .= '</div>';
    
    $table .= '<div style="margin-top: 100px; overflow-y: auto; height: 360px;">';
    $table .= '<table border="1" style="table-layout: fixed; width: 100%;">';
    $table .= '<thead style="position: sticky; top: 0; background-color: #f0f0f0;">';
    $table .= '<tr><th style="width: 250px;">ลำดับที่</th><th>เลขที่ท่านได้</th></tr>';
    $table .= '</thead>';
    $table .= '<tbody>';
    
    foreach ($user_tickets as $index => $ticket) {
        $table .= "<tr><td style='width: 50px;'>" . ($index + 1) . "</td><td>$ticket</td></tr>";
    }
    
    $table .= '</tbody></table></div></div>';

    echo $table;
    $total_winnings = 0;
    for ($i = 0; $i < 12; $i++) {
        $round_num = $i + 1;
        
        $prizes_gsb = [
            'prize1' => [prize1_gsb()],
            'prize2' => [prize2_gsb()],
            'prize3' => prize3_gsb(),
            'prize4' => prize4_gsb(),
            'prize5' => prize5_gsb(),
            'last4' => [last4_gsb()],
            'last3' => [last3_gsb()]
        ];

        foreach ($prizes_gsb as $prize_type => $numbers) {
            $winning_numbers_str = implode(',', $numbers);
            if (!saveLotteryResult($conn, $round_num, $prize_type, $winning_numbers_str)) {
                echo "มีข้อผิดพลาดในการบันทึกผลรางวัล: รอบ $round_num, ประเภท $prize_type";
                error_log("Failed to save lottery result: round=$round_num, type=$prize_type, numbers=$winning_numbers_str");
            }
        }
        $winning_tickets = check_gsb_prizes($user_tickets, $prizes_gsb);
    
    }
    
    $interest_earned = $amount * ($interest_rate / 100) * $term_years;
    $sum_amount = $amount + $total_winnings + $interest_earned;

    echo "<h5>เช็คข้อมูล :</h5>";
    echo '<button id="showDetailsBtn" onclick="toggleDetails()" class="details-button">ผลการลงทุน</button>';
        
    // สร้าง div ที่จะซ่อนหรือแสดงรายละเอียด
    echo '<div id="investmentResultsContainer" style="display:none;">';

            
    echo '<style>
        table { width: 1350px; margin: auto; border-collapse: collapse; }
        th, td { padding: 8px; text-align: center; border: 1px solid #ff0f83; }
        th { background-color: #00000; }
    </style>';

    $round_prizes = array(); // เพิ่มบรรทัดนี้ก่อนเริ่มลูป

    for ($i = 0; $i < 12; $i++) {   
        $round_num = $i + 1;

        echo '<h4>ผลการออกรางวัล : รอบที่ ' . ($i + 1) . '</h4>';
        echo '<button class="showResults" onclick="toggleVisibility(\'results-' . $round_num . '\')">เพิ่มเติม</button>';
        echo '<div id="results-' . $round_num . '" class="resultsTable" style="display:none;">';

        echo '<table>';
        echo '<tr><th style="width: 250px;">ประเภท</th><th>เลขรางวัล</th></tr>';
        
        // 3. ระบบออกเลขรางวัล
        $prizes_gsb = [
            'prize1' => [prize1_gsb()],
            'prize2' => [prize2_gsb()],
            'prize3' => prize3_gsb(),
            'prize4' => prize4_gsb(),
            'prize5' => prize5_gsb(),
            'last4' => [last4_gsb()],
            'last3' => [last3_gsb()]
        ];
        
        echo '<tr><td>รางวัลที่ 1</td><td>' . $prizes_gsb['prize1'][0] . '</td></tr>';
        echo '<tr><td>รางวัลที่ 2</td><td>' . $prizes_gsb['prize2'][0] . '</td></tr>';

        // จัดการรางวัลที่ 3
        echo '<tr><td>รางวัลที่ 3</td><td>';
        foreach (array_chunk($prizes_gsb['prize3'], 5) as $chunk) {
            echo implode(" ", $chunk) . '<br>';
        }
        echo '</td></tr>';

        // จัดการรางวัลที่ 4
        echo '<tr><td>รางวัลที่ 4</td><td>';
        foreach (array_chunk($prizes_gsb['prize4'], 5) as $chunk) {
            echo implode(" ", $chunk) . '<br>';
        }
        echo '</td></tr>';

        // จัดการรางวัลที่ 5
        echo '<tr><td>รางวัลที่ 5</td><td>';
        foreach (array_chunk($prizes_gsb['prize5'], 5) as $chunk) {
            echo implode(" ", $chunk) . '<br>';
        }
        echo '</td></tr>';

        echo '<tr><td>รางวัลเลขท้าย 4 ตัว</td><td>' . $prizes_gsb['last4'][0] . '</td></tr>';
        echo '<tr><td>รางวัลเลขท้าย 3 ตัว</td><td>' . $prizes_gsb['last3'][0] . '</td></tr>';

        echo '</table>';

        $winning_tickets = check_gsb_prizes($user_tickets, $prizes_gsb);
        
        if (!empty($winning_tickets)) {
            echo '<p style="color: green;">รายการเลขที่ถูกรางวัล <i class="bi bi-emoji-smile"></i></p>';
            echo '<table class="highlight">';
            echo '<tr><th>เลขรางวัล</th><th>ประเภท</th><th>ยอดเงินรางวัล</th></tr>';
            
            $round_prize = 0;
            foreach ($winning_tickets as $ticket_prize) {
                $prize_amount = calculate_prize_amount($ticket_prize[1]);
                $round_prize += $prize_amount;
                
                if (!saveWinningTicket($conn, $round_num, $ticket_prize[0], $ticket_prize[1], $prize_amount)) {
                    echo "มีข้อผิดพลาดในการบันทึกข้อมูลรางวัล";
                    error_log("Failed to save winning ticket: round=$round_num, ticket={$ticket_prize[0]}, prize={$ticket_prize[1]}, amount=$prize_amount");
                }
                
                echo '<tr><td>' . $ticket_prize[0] . '</td><td>' . $ticket_prize[1] . '</td><td>' . number_format($prize_amount) . ' บาท</td></tr>';
            }

            $total_winnings += $round_prize;
            echo '</table>';
            echo '<p>รวมเงินรางวัลรอบนี้: ' . number_format($round_prize) . ' บาท</p>';
            // อัพเดทผลรวมในหน้าเว็บ
            echo '<script>
                document.getElementById("total-winnings").innerText = "' . number_format($total_winnings) . '";
                document.getElementById("total-return").innerText = "' . number_format($amount + $total_winnings + $interest_earned, 2) . '";
            </script>';
        } else {
            echo '<p style="color: red;">เสียใจด้วย! คุณไม่ถูกรางวัลในครั้งนี้ <i class="bi bi-emoji-frown"></i></p>';
        }
        $current_total = array_sum($round_prizes);
        // echo '<p>รวมเงินรางวัลทั้งหมดถึงตอนนี้: ' . number_format($total_winnings) . ' บาท</p>';
        echo "<br>";
        echo '</div>';
    }

    echo '</div>';  

    saveInvestmentResult($conn, $amount, $total_winnings, $interest_earned, $sum_amount);
    
    $result = '<div class="blackg-g">';
    $result .= '<h2>ผลการลงทุนรวม</h2>';
    $result .= '<div class="result-row"><span class="result-label">ท่านได้สลากออมสินทั้งหมด :</span><span class="result-box">' . $tickets . '</span><span class="result-unit">ใบ</span></div>';
    $result .= '<div class="result-row"><span class="result-label">เงินต้นที่ลงทุน :</span><span class="result-box">' . number_format($amount) . '</span><span class="result-unit">บาท</span></div>';
    $result .= '<div class="result-row"><span class="result-label">จำนวนรางวัลที่ได้รับทั้งหมด :</span><span class="result-box" id="total-winnings">' . number_format($total_winnings) .'</span><span class="result-unit">บาท</span></div>';
    $result .= '<div class="result-row"><span class="result-label">ดอกเบี้ยที่ได้รับเมื่อฝากครบ :</span><span class="result-box">' . number_format($interest_earned, 2) . '</span><span class="result-unit">บาท</span></div>';   
    $result .= '<div class="result-row"><span class="result-label">ผลตอบแทนรวมจากการลงทุน :</span><span class="result-box" id="total-return">' . number_format($sum_amount, 2) . '</span><span class="result-unit">บาท</span></div>';   
    $result .= '</div>';
    echo $result;

}
$conn->close();
?>

<script>
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

function updateTotals(totalWinnings, totalReturn) {
    document.getElementById("total-winnings").innerText = totalWinnings;
    document.getElementById("total-return").innerText = totalReturn;
}

</script>