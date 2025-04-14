<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include('includes/db.php');
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="assets/chart.min.js"></script>
</head>
<body class="bg-gradient">
    <div class="form-container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p><a href="add_expense.php">➕ Add Expense</a> | <a href="view_expense.php">📋 View Expenses</a> | <a href="monthly_report.php">📊 Monthly Report</a> | <a href="logout.php">🚪 Logout</a></p>

        <h3>Your Summary</h3>
        <?php
        $incomeResult = $conn->query("SELECT SUM(amount) as total_income FROM expenses WHERE user_id = $user_id AND type='income'");
        $expenseResult = $conn->query("SELECT SUM(amount) as total_expense FROM expenses WHERE user_id = $user_id AND type='expense'");
        $income = $incomeResult->fetch_assoc()['total_income'] ?? 0;
        $expense = $expenseResult->fetch_assoc()['total_expense'] ?? 0;
        $balance = $income - $expense;
        ?>

        <ul>
            <li><strong>Total Income:</strong> ₹<?php echo number_format($income, 2); ?></li>
            <li><strong>Total Expense:</strong> ₹<?php echo number_format($expense, 2); ?></li>
            <li><strong>Balance:</strong> ₹<?php echo number_format($balance, 2); ?></li>
        </ul>

        <canvas id="summaryChart" width="300" height="300"></canvas>
        <script>
            const ctx = document.getElementById('summaryChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Income', 'Expense'],
                    datasets: [{
                        data: [<?php echo $income; ?>, <?php echo $expense; ?>],
                        backgroundColor: ['#4CAF50', '#FF5252'],
                        hoverOffset: 10
                    }]
                }
            });
        </script>
    </div>
</body>
</html>
