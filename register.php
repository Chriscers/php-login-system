<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register Form</title>
</head>

<body>
    <div class="form-container">
        <form method="post" action="register.php">
        <h3>Register Now</h3>
            <input type="text" name="Fname" id="Fname" placeholder="Enter your first name" autocomplete="off" required>
            <input type="text" name="Lname" id="Lname" placeholder="Enter your last name" autocomplete="off" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" autocomplete="off" required>
            <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" autocomplete="off" required>
            <input type="submit" class="form-btn" name="Signup" value="Register Now" required>
        <p>Already have an account? <a href="index.php">Log In Now</a>
        </form>
    </div>

    <div>
    <?php
        include 'connect.php';

        if (isset($_POST['Signup'])) {
            $Fname = $_POST['Fname'];
            $Lname = $_POST['Lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password === $confirm_password) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $query = $conn->prepare("INSERT INTO users (Fname, Lname, email, password) VALUES (?, ?, ?, ?)");
                $query->bind_param("ssss", $Fname, $Lname, $email, $hashed_password);
                $query->execute();

                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Passwords do not match!'); window.location.href='register.php';</script>";
            }
        }
        ?>
    </div>

</body>
</html>