<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="dashboard">
    <h1>Welcome, <?php echo $_SESSION['student']; ?>!</h1>
    <p>This is your student dashboard.</p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
