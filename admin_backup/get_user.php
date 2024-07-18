<?php
session_start();
include('server.php');

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$query = "SELECT id, username, email, role FROM users";
$result = mysqli_query($conn, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

header('Content-Type: application/json');
echo json_encode($users);