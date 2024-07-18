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

</head>
<body>
<?php
require_once 'db_buyrandom.php';
function random_number() {
    return str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
}

function random_choices($values, $weights) {
    $total_weight = array_sum($weights);
    $rand = mt_rand(0, $total_weight - 1);
    foreach ($values as $i => $value) {
        if ($rand < $weights[$i]) {
            return $value;
        }
        $rand -= $weights[$i];
    }
}
function prize1_glo() {
    $percentages_prize1 = [
        [0, 8.5], [1, 10.5], [2, 8.0], [3, 10.4], [4, 8.0], [5, 10.4], [6, 8.0], [7, 9.0], [8, 8.0], [9, 8.2]
    ];
    $random_number = "";
    for ($i = 0; $i < 6; $i++) {
        $chosen_digit = random_choices(array_column($percentages_prize1, 0), array_column($percentages_prize1, 1));
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function prize2_glo() {
    $percentages_prize2 = [
        [0, 10.5], [1, 8.0], [2, 10.4], [3, 8.4], [4, 8.0], [5, 8.4], [6, 8.0], [7, 10.5], [8, 8.0], [9, 8.2]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 5; $j++) {
        $random_number = "";
        for ($i = 0; $i < 6; $i++) {
            $chosen_digit = random_choices(array_column($percentages_prize2, 0), array_column($percentages_prize2, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function prize3_glo() {
    $percentages_prize3 = [
        [0, 10.3], [1, 8.0], [2, 8.4], [3, 10.4], [4, 8.0], [5, 10.2], [6, 9.0], [7, 9.5], [8, 9.0], [9, 8.2]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 10; $j++) {
        $random_number = "";
        for ($i = 0; $i < 6; $i++) {
            $chosen_digit = random_choices(array_column($percentages_prize3, 0), array_column($percentages_prize3, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function prize4_glo() {
    $percentages_prize4 = [
        [0, 8.3], [1, 10.0], [2, 10.2], [3, 10.4], [4, 8.0], [5, 9.2], [6, 9.0], [7, 9.5], [8, 9.0], [9, 8.2]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 50; $j++) {
        $random_number = "";
        for ($i = 0; $i < 6; $i++) {
            $chosen_digit = random_choices(array_column($percentages_prize4, 0), array_column($percentages_prize4, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function prize5_glo() {
    $percentages_prize5 = [
        [0, 10.3], [1, 9.0], [2, 9.2], [3, 8.4], [4, 8.0], [5, 9.2], [6, 10.0], [7, 9.0], [8, 10.0], [9, 8.2]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 100; $j++) {
        $random_number = "";
        for ($i = 0; $i < 6; $i++) {
            $chosen_digit = random_choices(array_column($percentages_prize5, 0), array_column($percentages_prize5, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function front3_glo() {
    $percentages_front3_glo = [
        [0, 8.5], [1, 8.0], [2, 8.5], [3, 10.5], [4, 8.0], [5, 8.2], [6, 10.2], [7, 8.0], [8, 10.5], [9, 8.2]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 2; $j++) {
        $random_number = "";
        for ($i = 0; $i < 3; $i++) {
            $chosen_digit = random_choices(array_column($percentages_front3_glo, 0), array_column($percentages_front3_glo, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function last3_glo() {
    $percentages_last3_glo = [
        [0, 8.5], [1, 8.0], [2, 10.5], [3, 8.5], [4, 10.5], [5, 10.5], [6, 8.5], [7, 8.0], [8, 8.7], [9, 8.0]
    ];
    $random_numbers = [];
    for ($j = 0; $j < 2; $j++) {
        $random_number = "";
        for ($i = 0; $i < 3; $i++) {
            $chosen_digit = random_choices(array_column($percentages_last3_glo, 0), array_column($percentages_last3_glo, 1));
            $random_number .= strval($chosen_digit);
        }
        $random_numbers[] = $random_number;
    }
    return $random_numbers;
}

function last2_glo() {
    $percentages_last2_glo = [
        [0, 8.2], [1, 8.0], [2, 8.2], [3, 8.0], [4, 8.3], [5, 10.4], [6, 10.4], [7, 8.3], [8, 8.2], [9, 10.4]
    ];
    $random_number = "";
    for ($i = 0; $i < 2; $i++) {
        $chosen_digit = random_choices(array_column($percentages_last2_glo, 0), array_column($percentages_last2_glo, 1));
        $random_number .= strval($chosen_digit);
    }
    return $random_number;
}

function check_glo_prizes($user_tickets, $prizes_glo) {
    $winning_tickets = [];
    foreach ($user_tickets as $ticket) {
        if ($ticket == $prizes_glo['prize1'][0]) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 1'];
        }
        if (in_array($ticket, $prizes_glo['prize2'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 2'];
        }
        if (in_array($ticket, $prizes_glo['prize3'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 3'];
        }
        if (in_array($ticket, $prizes_glo['prize4'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 4'];
        }
        if (in_array($ticket, $prizes_glo['prize5'])) {
            $winning_tickets[] = [$ticket, 'รางวัลที่ 5'];
        }
        if (in_array(substr($ticket, 0, 3), $prizes_glo['front3'])) {
            $winning_tickets[] = [$ticket, 'รางวัลเลขหน้า 3 ตัว'];
        }
        if (in_array(substr($ticket, -3), $prizes_glo['last3'])) {
            $winning_tickets[] = [$ticket, 'รางวัลเลขท้าย 3 ตัว'];
        }
        if (in_array(substr($ticket, -2), $prizes_glo['last2'])) {
            $winning_tickets[] = [$ticket, 'รางวัลเลขท้าย 2 ตัว'];
        }
    }
    return $winning_tickets;
}

function calculate_total_prize_glo($winning_tickets) {
    $prize_amounts_glo = [
        'รางวัลที่ 1' => 6000000,
        'รางวัลที่ 2' => 100000,
        'รางวัลที่ 3' => 80000,
        'รางวัลที่ 4' => 40000,
        'รางวัลที่ 5' => 20000,
        'รางวัลเลขหน้า 3 ตัว' => 4000,
        'รางวัลเลขท้าย 3 ตัว' => 4000,
        'รางวัลเลขท้าย 2 ตัว' => 2000
    ];
    $total_prize = 0;
    foreach ($winning_tickets as [$ticket, $prize]) {
        $total_prize += $prize_amounts_glo[$prize];
    }
    return $total_prize;
}

function calculate_probability($prizes_glo) {
    $total_outcomes = 1000000; 
    $probabilities = [];
    $probabilities['รางวัลที่ 1'] = 1 / $total_outcomes;
    $probabilities['รางวัลที่ 2'] = 5 / $total_outcomes;
    $probabilities['รางวัลที่ 3'] = 10 / $total_outcomes;
    $probabilities['รางวัลที่ 4'] = 50 / $total_outcomes;
    $probabilities['รางวัลที่ 5'] = 100 / $total_outcomes;
    $probabilities['รางวัลเลขหน้า 3 ตัว'] = (2 * 1000) / $total_outcomes;
    $probabilities['รางวัลเลขท้าย 3 ตัว'] = (2 * 1000) / $total_outcomes; 
    $probabilities['รางวัลเลขท้าย 2 ตัว'] = 100 / $total_outcomes; 
    return $probabilities;
}

function calculate_expected_value($probabilities, $prize_amounts) {
    $expected_value = 0;
    foreach ($probabilities as $prize => $probability) {
        $expected_value += $probability * $prize_amounts[$prize];
    }
    return $expected_value;
}function calculate_winning_chance($total_tickets, $winning_tickets) {
    if ($total_tickets == 0) {
        return 0;
    }
    return (count($winning_tickets) / $total_tickets) * 100;
}

function calculate_return_on_investment($total_investment, $total_winnings) {
    if ($total_investment == 0) {
        return ($total_winnings > 0) ? INF : 0;
    }
    return (($total_winnings - $total_investment) / $total_investment) * 100;
}

function calculate_net_profit_loss($total_investment, $total_winnings) {
    return $total_winnings - $total_investment;
}

function formatPrizes($prizes) {
    $output = '';
    $chunks = array_chunk($prizes, 10);
    foreach ($chunks as $chunk) {
        $output .= implode(' ', $chunk) . '<br>';
    }
    return $output;
}

function saveInvestmentResult($conn, $total_investment, $total_winnings, $winning_chance, $total_roi, $profit, $loss, $avg_investment) {
    $sql = "INSERT INTO investment_results (total_investment, total_winnings, winning_chance, total_roi, profit, loss, avg_investment) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddddddd", $total_investment, $total_winnings, $winning_chance, $total_roi, $profit, $loss, $avg_investment);
    $stmt->execute();
    $stmt->close();
}

function saveWinningTickets($conn, $round, $ticket, $prize_type, $prize_amount) {
    $sql = "INSERT INTO winning_tickets (round, ticket_number, prize_type, prize_amount) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issd", $round, $ticket, $prize_type, $prize_amount);
    $stmt->execute();
    $stmt->close();
}

function saveLotteryResults($conn, $round, $prize_type, $winning_numbers) {
    $sql = "INSERT INTO lottery_results (round, prize_type, winning_numbers) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $round, $prize_type, $winning_numbers);
    $stmt->execute();
    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount_per_round = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    $total_investment = 0;
    $total_winnings = 0;
    $round_results = [];
    $ticket_price = 80;
    $rounds = 24;
    $tickets_per_round = floor($amount_per_round / $ticket_price);
    $actual_investment_per_round = $tickets_per_round * $ticket_price;
    $total_investment = $actual_investment_per_round * $rounds;
    $total_tickets = $tickets_per_round * $rounds;
    $change = ($amount_per_round * $rounds) - $total_investment;


    $prize_amounts_glo = [
        'รางวัลที่ 1' => 6000000,
        'รางวัลที่ 2' => 100000,
        'รางวัลที่ 3' => 80000,
        'รางวัลที่ 4' => 40000,
        'รางวัลที่ 5' => 20000,
        'รางวัลเลขหน้า 3 ตัว' => 4000,
        'รางวัลเลขท้าย 3 ตัว' => 4000,
        'รางวัลเลขท้าย 2 ตัว' => 2000
    ]; 

    for ($round = 1; $round <= $rounds; $round++) {
        $user_tickets = [];
    
        for ($i = 0; $i < $tickets_per_round; $i++) {
            $user_tickets[] = random_number();
        }
        $prizes_glo = [
            'prize1' => [prize1_glo()],
            'prize2' => prize2_glo(),
            'prize3' => prize3_glo(),
            'prize4' => prize4_glo(),
            'prize5' => prize5_glo(),
            'front3' => front3_glo(),
            'last3' => last3_glo(),
            'last2' => [last2_glo()]
        ];

        $winning_tickets = check_glo_prizes($user_tickets, $prizes_glo);
        $total_prize = calculate_total_prize_glo($winning_tickets);
        $total_winnings += $total_prize;

        // บันทึกเลขที่ถูกรางวัล
        foreach ($winning_tickets as [$ticket, $prize]) {
            $prize_amount = $prize_amounts_glo[$prize];
            saveWinningTickets($conn, $round, $ticket, $prize, $prize_amount);
        }

        // บันทึกผลการออกรางวัล
        saveLotteryResults($conn, $round, 'รางวัลที่ 1', implode(',', $prizes_glo['prize1']));
        saveLotteryResults($conn, $round, 'รางวัลที่ 2', implode(',', $prizes_glo['prize2']));
        saveLotteryResults($conn, $round, 'รางวัลที่ 3', implode(',', $prizes_glo['prize3']));
        saveLotteryResults($conn, $round, 'รางวัลที่ 4', implode(',', $prizes_glo['prize4']));
        saveLotteryResults($conn, $round, 'รางวัลที่ 5', implode(',', $prizes_glo['prize5']));
        saveLotteryResults($conn, $round, 'รางวัลเลขหน้า 3 ตัว', implode(',', $prizes_glo['front3']));
        saveLotteryResults($conn, $round, 'รางวัลเลขท้าย 3 ตัว', implode(',', $prizes_glo['last3']));
        saveLotteryResults($conn, $round, 'รางวัลเลขท้าย 2 ตัว', $prizes_glo['last2'][0]); // แก้ไขตรงนี้

        $round_results[] = [
            'user_tickets' => $user_tickets,
            'prizes_glo' => $prizes_glo,
            'winning_tickets' => $winning_tickets
        ];
    }

    $sum_total = $total_investment - $change;
  

    $probabilities = calculate_probability($prizes_glo);
    $expected_value = calculate_expected_value($probabilities, $prize_amounts_glo);
    $roi = calculate_return_on_investment($total_investment, $total_winnings);
    $net_profit_loss = calculate_net_profit_loss($total_investment, $total_winnings);
    $winning_chance = calculate_winning_chance($total_tickets, array_merge(...array_column($round_results, 'winning_tickets')));

    // บันทึกผลการลงทุน
    $avg_investment = $total_investment / $rounds;
    $profit = max(0, $net_profit_loss);
    $loss = abs(min(0, $net_profit_loss));
    saveInvestmentResult($conn, $total_investment, $total_winnings, $winning_chance, $roi, $profit, $loss, $avg_investment);

    // Display results
    $result = ' ';
    $result = '<div class="blackg-g" style="background-color: #61CBF5; width: 1350px; height: 820px; float: left;">';
    $result .= '<h2 style="float: right; margin: 50px 500px 50px 50px">ผลการลงทุน</h2>';
    $result .= '<div class="result-row"><span class="result-label">จำนวนเงินลงทุนทั้งหมด :</span><span class="result-box">' . number_format($total_investment) . '</span><span class="result-unit">บาท</span></div>';
    $result .= '<div class="result-row"><span class="result-label">จำนวนเงินถอน :</span><span class="result-box">' . number_format($change) . '</span><span class="result-unit">บาท</span></div>';
    $result .= '<div class="result-row"><span class="result-label">จำนวนรางวัลที่ได้รับทั้งหมด :</span><span class="result-box">' . number_format($total_winnings) . '</span><span class="result-unit">บาท</span></div>';
    $winning_chance = calculate_winning_chance($total_tickets, array_merge(...array_column($round_results, 'winning_tickets')));
    $result .= '<div class="result-row"><span class="result-label">โอกาสในการถูกรางวัล :</span><span class="result-box">' . number_format($winning_chance, 2) . '</span><span class="result-unit">%</span></div>';    $result .= '<div class="result-row"><span class="result-label">ผลตอบแทนจากการลงทุน :</span><span class="result-box">' . number_format($roi, 2) . '</span><span class="result-unit">%</span></div>';
    $net_profit_loss = calculate_net_profit_loss($total_investment, $total_winnings);
    $result .= '<div class="result-row"><span class="result-label">กำไร/ขาดทุนสุทธิ:</span><span class="result-box">' . number_format($net_profit_loss) . '</span><span class="result-unit">บาท</span></div>';
    
    $result .= '</div>';
    
    $result .= "<h5>เช็คข้อมูล :</h5>";
    $result .= '<button id="showDetailsBtn" onclick="toggleDetails()" class="details-button">แสดงผลการลงทุน</button>';
    
    $result .= '<div id="detailsContainer" style="display:none;">';
    // รายละเอียดผลการลงทุนแต่ละงวดจะถูกใส่ที่นี่
    
    foreach ($round_results as $round => $round_result) {
        $round_num = $round + 1;
        $result .= '<h4>การลงทุนรอบที่ ' . $round_num . '</h4>';
        $result .= '<div style="width: 100%; height: 270px; overflow-y: auto; overflow-x: hidden; position: relative;">';
        $result .= '<table border="1" style="table-layout: fixed; width: 100%;">';
        $result .= '<thead style="position: sticky; top: 0; background: white;">';
        $result .= '<tr><th style="width: 250px;">อันดับ</th><th style=" ">เลขสลากของท่าน</th></tr>';
        $result .= '</thead>';
        $result .= '<tbody>';
        $index = 1;
        foreach ($round_result['user_tickets'] as $ticket) {
            $result .= '<tr><td>' . $index . '</td><td>' . $ticket . '</td></tr>';
            $index++;
        }
        $result .= '</tbody>';
        $result .= '</table>';
        $result .= '</div>';

        // เพิ่มตารางแสดงรายการเลขที่ถูกรางวัลทั้งหมด
        if (count($round_result['winning_tickets']) > 0) {
            $result .= '<p style="color: green; text-align: center;">รายการเลขที่ถูกรางวัล <i class="bi bi-emoji-smile"></i></p>';
            $result .= '<table border="1" style="width: 1350px; >';
            $result .= '<tr style="background-color: #2dad0d;">';
            $result .= '<th style="background-color: #2dad0d;">เลขที่ถูกรางวัล</th>';
            $result .= '<th style="background-color: #2dad0d;">ประเภท</th>';
            $result .= '<th style="background-color: #2dad0d;">เงินรางวัล</th>';
            $result .= '</tr>';
            foreach ($round_result['winning_tickets'] as [$ticket, $prize]) {
                $prize_amount = $prize_amounts_glo[$prize];
                $result .= '<tr style="background-color: #c8e6c9;">';
                $result .= '<td>' . $ticket . '</td>';
                $result .= '<td>' . $prize . '</td>';
                $result .= '<td>' . number_format($prize_amount) . ' บาท</td>';
                $result .= '</tr>';
            }
            $result .= '</table>';
        } else {
            $result .= '<p style="color: red; text-align: center;">เสียใจด้วย! คุณไม่ถูกรางวัลในครั้งนี้ <i class="bi bi-emoji-frown"></i></p>';
        }

        $result .= '<button class="showResults" onclick="toggleVisibility(\'results-' . $round_num . '\')" style="width: 130px; height: 50px; font-weight: bold; font-size: 25px; margin: 30px 40px 50px -50px; float: right;">เพิ่มเติม</button>';
        $result .= '<div id="results-' . $round_num . '" class="resultsTable" style="display:none;">';
        
        $result .= '<h4>ผลการออกรางวัล</h4>';
        $result .= '<table border="1">';
        $result .= '<tr><th style="width: 250px;">ประเภท</th><th>เลขรางวัล</th></tr>';

        $prizes_glo = $round_result['prizes_glo'];
        $result .= '<tr><td>รางวัลที่ 1</td><td>' . $prizes_glo['prize1'][0] . '</td></tr>';
        $result .= '<tr><td>รางวัลที่ 2</td><td>' . formatPrizes($prizes_glo['prize2']) . '</td></tr>';
        $result .= '<tr><td>รางวัลที่ 3</td><td>' . formatPrizes($prizes_glo['prize3']) . '</td></tr>';
        $result .= '<tr><td>รางวัลที่ 4</td><td>' . formatPrizes($prizes_glo['prize4']) . '</td></tr>';
        $result .= '<tr><td>รางวัลที่ 5</td><td>' . formatPrizes($prizes_glo['prize5']) . '</td></tr>';
        $result .= '<tr><td>รางวัลเลขหน้า 3 ตัว</td><td>' . formatPrizes($prizes_glo['front3']) . '</td></tr>';
        $result .= '<tr><td>รางวัลเลขท้าย 3 ตัว</td><td>' . formatPrizes($prizes_glo['last3']) . '</td></tr>';
        $result .= '<tr><td>รางวัลเลขท้าย 2 ตัว</td><td>' . $prizes_glo['last2'][0] . '</td></tr>';
        $result .= '</table>';
        $result .= '</div>';
    
    }
    
    $result .= '</div>';
    
    $total_prize = calculate_total_prize_glo($winning_tickets);
    $total_winnings += $total_prize;

    $result .= "<button><a href=\"index.php\" class=\"button\"><i class=\"bi bi-caret-right-fill\"></i></a></button>";
    

    echo $result; 
}
$conn->close();
?>

<script>
    function toggleVisibility(elementId) {
        const element = document.getElementById(elementId);
        if (element.style.display === 'none') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }

    function toggleDetails() {
        const detailsContainer = document.getElementById('detailsContainer');
        if (detailsContainer.style.display === 'none') {
            detailsContainer.style.display = 'block';
            document.getElementById('showDetailsBtn').innerText = 'ซ่อนผลการลงทุน';
        } else {
            detailsContainer.style.display = 'none';
            document.getElementById('showDetailsBtn').innerText = 'แสดงผลการลงทุน';
        }
    }
</script>

</body>
</html>