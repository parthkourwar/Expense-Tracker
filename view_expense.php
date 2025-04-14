<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include('includes/db.php');
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Expenses</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gradient">
<div class="form-container">
    <h2>Your Transactions</h2>
    <a href="dashboard.php">← Back to Dashboard</a><br><br>
    <table border="1" cellpadding="8" style="width:100%; background:white; color:black;">
        <tr>
            <th>Title</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
        <?php
        $sql = "SELECT * FROM expenses WHERE user_id = $user_id ORDER BY date DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>₹" . number_format($row['amount'], 2) . "</td>
                    <td>{$row['type']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['date']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
