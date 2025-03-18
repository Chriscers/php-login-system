<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="design-code.css">
    <title>Login</title>
</head>
<body> 
    <div class="container" id="SignIn">

        <div class="rect-container">
        <div class="rect-container2">
        </div>
        </div>

        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Email" required />
            <input type="password" name="password" id="password" placeholder="Password" required />
            <button type="submit" class="btn" name="SignIn">Log In</button>
        </form>
        <a href="register.php" class="register-link">Create New Account</a>
    </div>
</body>
</html>
 