<?php
session_start();
include 'connect.php';

if (isset($_POST['SignIn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email!'); window.location.href='index.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>