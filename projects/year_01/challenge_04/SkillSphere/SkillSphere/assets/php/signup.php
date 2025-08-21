<?php
// session start
session_start();
include("database.inc.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($firstname) && !empty($lastname) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (fname, lname, email, password) VALUES (?, ?, ?, ?)";
        $data = [$firstname, $lastname, $email, $hashed_password];

        $result = Database::getData($sql, $data);

        // Check based on expected `getData` behavior
        if ($result === true || $result > 0) { // Adjust as per Database::getData behavior
            header("Location: login.php?signup=success");
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Registration failed. Please try again.');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Voer geldige informatie in.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillBuddy | Sign Up</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="icon" href="../images/favicon-32x32-circle.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="icon" href="../assets/images/favicon-32x32-circle.png">
</head>
<body>
    <div class="session">
        <div class="left">
            <!-- Left Section (SVG or image) -->
            <img src="../images/left-section.svg" alt="Left Section Graphic">
        </div>
        <form action="" method="POST" class="log-in" autocomplete="off"> 
    <h4>Welcome to <span>SkillBuddy!</span></h4>
    <p>Welcome! Sign up to view and create new posts!</p>

    <div class="floating-label">
        <div class="icon">
            <i class="fas fa-user"></i> <!-- First Name Icon -->
        </div>
        <input placeholder="First Name" type="text" name="fname" id="fname" autocomplete="off" required>
        <label for="fname">First Name:</label>
    </div>

    <div class="floating-label">
        <div class="icon">
            <i class="fas fa-user-tag"></i> <!-- Last Name Icon -->
        </div>
        <input placeholder="Last Name" type="text" name="lname" id="lname" autocomplete="off" required>
        <label for="lname">Last Name:</label>
    </div>

    <div class="floating-label">
        <div class="icon">
            <i class="fas fa-envelope"></i> <!-- Email Icon -->
        </div>
        <input placeholder="Email" type="email" name="email" id="email" autocomplete="off" required>
        <label for="email">Email:</label>
    </div>

    <div class="floating-label">
        <div class="icon">
            <i class="fas fa-lock"></i> <!-- Password Icon -->
        </div>
        <input placeholder="Password" type="password" name="password" id="password" autocomplete="off" required>
        <label for="password">Password:</label>
    </div>

    <button type="submit">
        <i class="fas fa-sign-in-alt"></i> Sign Up
    </button>

    <p style="font-size:17px;">Already have an account?<br><a href="login.php">Log In</a></p>

        </form>
    </div>
</body>
</html>