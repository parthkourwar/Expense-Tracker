<?php
include('includes/db.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gradient">
    <div class="form-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Log In</button>
        </form>
        <a href="register.php">Don't have an account?</a>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Correct SQL query to prevent the syntax error
    $sql = "SELECT * FROM users WHERE username='$username'";  // Removed the unexpected string content

    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p>Invalid password!</p>";
        }
    } else {
        echo "<p>User not found!</p>";
    }
}
?>
</body>
</html>
