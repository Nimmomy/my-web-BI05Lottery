<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Search Tickets</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.css' integrity='sha512-kYOMiaoKMZJ+4BIGOKuBJ19/SvBNKsuThdvZHppiLjJ/1RAEr64IQIoUk2cww5LJLWPRomM4N3j4+e0SzYe5Dg==' crossorigin='anonymous'/>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/process_selection.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    </div>

<?php
require_once 'db_searchtickets.php';
function generateRandomNumber($length = 6) {
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
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
        if (substr($ticket, -2) == $prizes_glo['last2'][0]) {
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

function calculate_winning_chance($total_tickets, $winning_tickets) {
    if ($total_tickets == 0) {
        return 0;
    }
    return (count($winning_tickets) / $total_tickets) * 100;
}

function calculate_total_return_on_investment($total_investment, $total_winnings) {
    if ($total_investment == 0) {
        return ($total_winnings > 0) ? INF : 0;
    }
    return (($total_winnings - $total_investment) / $total_investment) * 100;
}

function calculate_savings_bond_investment($initial_investment, $num_rounds) {
    $investment_data = [];
    $current_investment = $initial_investment;
    for ($i = 0; $i < $num_rounds; $i++) {
        $current_investment *= 1.0025; // 0.25% interest per round
        $investment_data[] = $current_investment;
    }
    return $investment_data;
}

function saveInvestmentResult($conn, $total_investment, $total_winnings, $winning_chance, $total_roi, $profit_loss, $avg_investment) {
    $sql = "INSERT INTO investment_results (total_investment, total_winnings, winning_chance, total_roi, profit, loss, avg_investment) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $profit = max(0, $profit_loss);
    $loss = abs(min(0, $profit_loss));
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedTicketsData']) && isset($_POST['numRounds'])) {
    $selectedTicketsData = json_decode($_POST['selectedTicketsData'], true);
    $numRounds = intval($_POST['numRounds']);

    if (!empty($selectedTicketsData) && $numRounds >= 1 && $numRounds <= 24) {
        $totalTicketsPerRound = array_sum(array_column($selectedTicketsData, 'quantity'));
        
        echo "<div style='width: 1350px; margin: 0 auto;'>";

        // ตัวแปรสำหรับเก็บข้อมูลรวม
        $total_investment = 0;
        $total_winnings = 0;
        $total_tickets = 0;
        $all_winning_tickets = [];
        $round_results = [];

        for ($round = 1; $round <= 24; $round++) {
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

            $user_tickets = [];

            // ใช้เลขที่ผู้ใช้เลือกสำหรับงวดที่เลือก
            if ($round <= $numRounds) {
                foreach ($selectedTicketsData as $ticket) {
                    for ($i = 0; $i < $ticket['quantity']; $i++) {
                        $user_tickets[] = $ticket['number'];
                    }
                }
            } else {
                // สุ่มเลขสำหรับงวดที่เหลือ
                for ($i = 0; $i < $totalTicketsPerRound; $i++) {
                    $randomNumber = generateRandomNumber();
                    $user_tickets[] = $randomNumber;
                }
            }

            $winning_tickets = check_glo_prizes($user_tickets, $prizes_glo);

            // คำนวณและสะสมข้อมูล
            $round_investment = $totalTicketsPerRound * 80; // สมมติราคาสลาก 80 บาท
            $total_investment += $round_investment;
            $round_winnings = calculate_total_prize_glo($winning_tickets);
            $total_winnings += $round_winnings;
            $total_tickets += $totalTicketsPerRound;
            $all_winning_tickets = array_merge($all_winning_tickets, $winning_tickets);

            $round_results[$round] = [
                'user_tickets' => $user_tickets,
                'prizes_glo' => $prizes_glo,
                'winning_tickets' => $winning_tickets,
                'round_winnings' => $round_winnings
            ];

        }
        
        // คำนวณสถิติรวม
        $winning_chance = calculate_winning_chance($total_tickets, $all_winning_tickets);
        $total_roi = calculate_total_return_on_investment($total_investment, $total_winnings);
        
        $profit_loss = $total_winnings - $total_investment;
        $avg_investment = $total_investment / 24;

        saveInvestmentResult($conn, $total_investment, $total_winnings, $winning_chance, $total_roi, $profit_loss, $avg_investment);
        
        // สร้างข้อมูลสำหรับกราฟ
        $lottery_investment_data = [];
        $lottery_profit_loss_data = [];
        $savings_bond_data = calculate_savings_bond_investment($round_investment, 24);
        
        for ($round = 1; $round <= 24; $round++) {
            $result = $round_results[$round];
            foreach ($result['winning_tickets'] as $ticket) {
                $prize_type = $ticket[1];
                $prize_amount = $prize_amounts_glo[$prize_type] ?? 0;
                saveWinningTickets($conn, $round, $ticket[0], $prize_type, $prize_amount);
            }
        }
        for ($round = 1; $round <= 24; $round++) {
            $prizes_glo = $round_results[$round]['prizes_glo'];
            saveLotteryResults($conn, $round, 'รางวัลที่ 1', implode(',', $prizes_glo['prize1']));
            saveLotteryResults($conn, $round, 'รางวัลที่ 2', implode(',', $prizes_glo['prize2']));
            saveLotteryResults($conn, $round, 'รางวัลที่ 3', implode(',', $prizes_glo['prize3']));
            saveLotteryResults($conn, $round, 'รางวัลที่ 4', implode(',', $prizes_glo['prize4']));
            saveLotteryResults($conn, $round, 'รางวัลที่ 5', implode(',', $prizes_glo['prize5']));
            saveLotteryResults($conn, $round, 'รางวัลเลขหน้า 3 ตัว', implode(',', $prizes_glo['front3']));
            saveLotteryResults($conn, $round, 'รางวัลเลขท้าย 3 ตัว', implode(',', $prizes_glo['last3']));
            saveLotteryResults($conn, $round, 'รางวัลเลขท้าย 2 ตัว', implode(',', $prizes_glo['last2']));
        }

        for ($round = 1; $round <= 24; $round++) {
            $lottery_investment_data[] = $round_investment * $round;
            $lottery_profit_loss_data[] = ($total_winnings / 24 * $round) - ($round_investment * $round);
        }

        // แปลงข้อมูลเป็น JSON สำหรับใช้ใน JavaScript
        $lottery_investment_json = json_encode($lottery_investment_data);
        $lottery_profit_loss_json = json_encode($lottery_profit_loss_data);
        $savings_bond_json = json_encode($savings_bond_data);


        // แสดงผลสรุป
        echo '<div class="blackg-g ">';
        echo "<h2>ผลการลงทุน</h2>";
        echo '<div class="result-row"><span class="result-label">จำนวนเงินลงทุนทั้งหมด :</span><span class="result-box">' . number_format($total_investment) . '</span><span class="result-unit">บาท</span></div>';
        echo '<div class="result-row"><span class="result-label">จำนวนรางวัลที่ได้รับทั้งหมด :</span><span class="result-box">' . number_format($total_winnings) . '</span><span class="result-unit">บาท</span></div>';
        echo '<div class="result-row"><span class="result-label">โอกาสในการถูกรางวัล :</span><span class="result-box">' . number_format($winning_chance, 2) . '</span><span class="result-unit">%</span></div>';
        echo '<div class="result-row"><span class="result-label">ผลตอบแทนจากการลงทุน :</span><span class="result-box">' . number_format($total_roi, 2) . '</span><span class="result-unit">%</span></div>';
    
        // เพิ่มการแสดงผลกำไร/ขาดทุน
        $profit_loss = $total_winnings - $total_investment;
        if ($profit_loss > 0) {
            echo '<div class="result-row"><span class="result-label">กำไรรวม :</span><span class="result-box">' . number_format($profit_loss) . '</span><span class="result-unit">บาท</span></div>';    
        } elseif ($profit_loss < 0) {
            echo '<div class="result-row"><span class="result-label">ขาดทุนรวม :</span><span class="result-box">' . number_format(abs($profit_loss)) . '</span><span class="result-unit">บาท</span></div>';    
        } else {
            echo "<p>เงินทุนเท่าทุน</p>";
        }

        $avg_investment = $total_investment / 24;
        echo '<div class="result-row"><span class="result-label">เงินลงทุนเฉลี่ยต่องวด :</span><span class="result-box">' . number_format($avg_investment) . '</span><span class="result-unit">บาท</span></div>';    
        echo "</div>";

        // แสดงกราฟ
        echo '<div style="width: 90%; margin: 60px auto;"><canvas id="investmentChart" width="1350" height="900" style="width:100%;max-width:1350px"></canvas></div>';
        echo '<div style="width: 90%; margin: auto;"><canvas id="profitLossChart" ></canvas></div>';

        // สร้างปุ่ม "ผลการลงทุน"
        echo "<h5>เช็คข้อมูล :</h5>";
        echo '<button id="showDetailsBtn" onclick="toggleDetails()" class="details-button">ผลการลงทุน</button>';

        // สร้าง div ที่จะซ่อนหรือแสดงรายละเอียด
        echo '<div id="detailsContainer" style="display:none;">';
        
        // แสดงรายละเอียดผลการลงทุนแต่ละงวด
        for ($round = 1; $round <= 24; $round++) {
            $result = $round_results[$round];
            echo "<h3>งวดที่ {$round}</h3>";
            echo "<div class='table-container'>";
            
            echo "<table style='width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; width: 100%;'>
                    <thead>
                        <tr>
                            <th style='text-align: center; padding: 5px; border: 1px solid #001D54;'>อันดับ</th>
                            <th style='text-align: center; padding: 5px; border: 1px solid #001D54;'>เลข</th>
                            <th style='text-align: center; padding: 5px; border: 1px solid #001D54;'>จำนวนใบ</th>
                        </tr>
                    </thead>
                    <tbody>";

            $order = 1;
            $ticket_count = array_count_values($result['user_tickets']);
            if ($round <= $numRounds) {
                foreach ($selectedTicketsData as $ticket) {
                    echo "<tr>
                            <td style='padding: 5px; border: 1px solid #001D54;'>{$order}</td>
                            <td style='padding: 5px; border: 1px solid #001D54;'>{$ticket['number']}</td>
                            <td style='padding: 5px; border: 1px solid #001D54;'>{$ticket['quantity']}</td>
                        </tr>";
                    $order++;
                }
            } else {
                for ($i = 0; $i < $totalTicketsPerRound; $i++) {
                    $randomNumber = generateRandomNumber();
                    echo "<tr>
                            <td style='padding: 5px; border: 1px solid #001D54;'>{$order}</td>
                            <td style='padding: 5px; border: 1px solid #001D54;'>{$randomNumber}</td>
                            <td style='padding: 5px; border: 1px solid #001D54;'>1</td>
                        </tr>";
                    $order++;
                }
            }

            echo "</tbody></table>";
            echo "</div>";

            /// แสดงผลการตรวจรางวัล
            if (!empty($result['winning_tickets'])) {
                echo '<p style="color: green; text-align: center;">รายการเลขที่ถูกรางวัล <i class="bi bi-emoji-smile"></i></p>';
                echo '<table border="1" style="width: 100%; max-width: 1350px; margin: 0 auto; border-collapse: collapse;">';
                echo '<thead><tr style="background-color: #2dad0d;"><th>เลขที่ถูกรางวัล</th><th>ประเภท</th><th>เงินรางวัล</th></tr></thead>';
                echo '<tbody>';
                foreach ($result['winning_tickets'] as $ticket) {
                    $prize_type = $ticket[1];
                    $prize_amount = $prize_amounts_glo[$prize_type] ?? 0;
                    echo '<tr style="background-color: #c8e6c9;">';
                    echo '<td>' . htmlspecialchars($ticket[0]) . '</td>';
                    echo '<td>' . htmlspecialchars($prize_type) . '</td>';
                    echo '<td>' . number_format($prize_amount) . ' บาท</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
                echo '<p style="color: green; text-align: center;">ยอดเงินรางวัลรวม: ' . number_format($result['round_winnings']) . ' บาท</p>';
            } else {
                echo '<p style="color: red; text-align: center;">เสียใจด้วย! คุณไม่ถูกรางวัลในครั้งนี้ <i class="bi bi-emoji-frown"></i></p>';
            }
            echo '<button class="showResults" onclick="toggleVisibility(\'results-' . $round . '\')" style="width: 130px; height: 50px; font-weight: bold; font-size: 25px; margin: 30px 40px 50px -50px; float: right;">เพิ่มเติม</button>';
            echo '<div id="results-' . $round . '" class="resultsTable" style="display:none;">';
            echo '<h4>ผลการออกรางวัล</h4>';
            echo '<table border="1">';
            echo '<tr><th style="width: 250px;" >ประเภท</th><th>เลขรางวัล</th></tr>';

            $prizes_glo = $result['prizes_glo'];
            echo '<tr><td>รางวัลที่ 1</td><td>' . $prizes_glo['prize1'][0] . '</td></tr>';
            echo '<tr><td>รางวัลที่ 2</td><td>' . implode(', ', $prizes_glo['prize2']) . '</td></tr>';
            echo '<tr><td>รางวัลที่ 3</td><td>' . implode(', ', $prizes_glo['prize3']) . '</td></tr>';
            echo '<tr><td>รางวัลที่ 4</td><td>' . implode(', ', $prizes_glo['prize4']) . '</td></tr>';
            echo '<tr><td>รางวัลที่ 5</td><td>' . implode(', ', $prizes_glo['prize5']) . '</td></tr>';
            echo '<tr><td>รางวัลเลขหน้า 3 ตัว</td><td>' . implode(', ', $prizes_glo['front3']) . '</td></tr>';
            echo '<tr><td>รางวัลเลขท้าย 3 ตัว</td><td>' . implode(', ', $prizes_glo['last3']) . '</td></tr>';
            echo '<tr><td>รางวัลเลขท้าย 2 ตัว</td><td>' . $prizes_glo['last2'][0] . '</td></tr>';
            echo '</table>';
            echo '</div>';

        }

        echo '</div>'; // ปิด detailsContainer

        echo "<button><a href=\"index.php\" class=\"button\"><i class=\"bi bi-caret-right-fill\"></i></a></button>";

    } else {
        if ($numRounds < 1 || $numRounds > 24) {
            echo "จำนวนงวดไม่ถูกต้อง กรุณากรอกจำนวนงวดระหว่าง 1 ถึง 24";
        } else {
            echo "ไม่มีข้อมูลที่เลือกหรือข้อมูลไม่ถูกต้อง";
        }
    }
} else {
    echo "ไม่พบข้อมูลที่ส่งมา";
}
echo "</div>";
$conn->close();
?>

<script>
function calculateSavingsBondReturn(initialInvestment) {
    return initialInvestment * 0.0025; // 0.25% ของเงินต้น
}

const canvas = document.getElementById('investmentChart');
const ctx = canvas.getContext('2d');
const scale = window.devicePixelRatio;
canvas.style.width = canvas.width + 'px';
canvas.style.height = canvas.height + 'px';
canvas.width = canvas.width * scale;
canvas.height = canvas.height * scale;
ctx.scale(scale, scale);
const investmentCtx = document.getElementById('investmentChart').getContext('2d');
new Chart(investmentCtx, {
    type: 'bar',
    data: {
        labels: ['สลากกินแบ่ง', 'สลากออมสิน'],
        datasets: [{
            label: 'เงินต้น',
            data: [<?php echo $total_investment; ?>, <?php echo $total_investment; ?>],
            backgroundColor: 'rgba(54, 162, 235, 0.8)',
            borderColor: 'rgb(54, 162, 235)',
            borderWidth: 2
        }, {
            label: 'กำไร',
            data: [
                Math.max(0, <?php echo $total_winnings - $total_investment; ?>),
                calculateSavingsBondReturn(<?php echo $total_investment; ?>)
            ],
            backgroundColor: 'rgb(0, 195, 13)',
            borderWidth: 2
        }, {
            label: 'ขาดทุน',
            data: [
                Math.min(0, <?php echo $total_winnings - $total_investment; ?>),
                0 // สลากออมสินไม่มีขาดทุน
            ],
            backgroundColor: 'rgb(255, 0, 0)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                text: 'เปรียบเทียบผลการลงทุน: สลากกินแบ่ง vs สลากออมสิน',
                font: {
                    size: 50,
                    weight: 'bold',
                    family: "'IBM Plex Sans Thai', sans-serif"
                    
                },
                padding: {
                    top: 10,
                    bottom: 30
                }
            },
            legend: {
                position: 'top',
                labels: {
                    font: {
                        size: 20,
                        family: "'IBM Plex Sans Thai', sans-serif"
                    },
                    padding: 20
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'จำนวนเงิน (บาท)',
                    font: {
                        size: 25,
                        weight: 'bold',
                        family: "'IBM Plex Sans Thai', sans-serif"
                    }
                },
                ticks: {
                    font: {
                        size: 20,
                        family: "'IBM Plex Sans Thai', sans-serif"
                    },
                    callback: function(value, index, values) {
                        return value.toLocaleString();
                    }
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'ประเภทการลงทุน',
                    font: {
                        size: 25,
                        weight: 'bold',
                        family: "'IBM Plex Sans Thai', sans-serif"
                    }
                },
                ticks: {
                    font: {
                        size: 20,
                        family: "'IBM Plex Sans Thai', sans-serif"
                    }
                }
            }
        }
    }
});


// เพิ่มฟังก์ชันใหม่สำหรับการแสดง/ซ่อนรายละเอียด
function toggleDetails() {
    var detailsContainer = document.getElementById('detailsContainer');
    var showDetailsBtn = document.getElementById('showDetailsBtn');
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
                        

</body>
</html>