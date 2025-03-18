<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body style="text-align: center; padding: 15%;">
    <div style="font-size: 50px; font-weight: bold;">
        Hello, <?php echo "Welcome " . $_SESSION['email']; ?>
    </div>
    <a class="button" href="logout.php">Logout</a>
</body>
</html>