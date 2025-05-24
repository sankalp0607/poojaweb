<?php
session_start();
require_once('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // use hash for security

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css"> <!-- ✅ Linking the CSS file -->
</head>
<body>
    <form method="POST">
        <h2>Admin Login</h2>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
<div class="floating-icons">
    <span>🕉️</span>
    <span>卐</span>
    <span>🕉️</span>
    <span>卐</span>
    <span>🕉️</span>
</div>
<div class="watermark-text">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामयाः|</div> 
<a href="../tem.html" class="home-button">
    <span class="home-icon">🏠</span> Home
</a>
</body>
</html>
