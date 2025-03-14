<?php
session_start();
include "config.php"; // Ensure database connection

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("error: Missing username or password");
}

$username = trim($_POST['username']);
$password = $_POST['password']; // User's entered password

// Fetch user from the database
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


if ($user) {
    // Verify password using password_verify()
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        echo "success";
    } else {
        echo "Invalid login credentials!";
    }
} else {
    echo "Invalid login credentials!";
}

$conn->close();
?>
