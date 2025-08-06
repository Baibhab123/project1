<?php
session_start();
$conn = new mysqli("localhost", "root", "", "student_portal");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['student'] = $user['name'];
        header("Location: dashboard.php");
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
