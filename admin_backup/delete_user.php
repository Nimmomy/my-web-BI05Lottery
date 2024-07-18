<?php
session_start();
include('server.php');

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('HTTP/1.0 403 Forbidden');
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(['message' => 'User deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete user']);
    }
} else {
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode(['error' => 'Method not allowed']);
}