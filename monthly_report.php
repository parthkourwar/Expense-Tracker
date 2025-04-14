<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include('includes/db.php');

$user_id = $_SESSION['user_id'];

// Get income and expenses per month
$sql = "
SELECT 
    MONTH(date) AS month, 
    SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) AS total_income,
    SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) AS total_expense
FROM expenses
WHERE user_id = $user_id
GROUP BY MONTH(date)
ORDER BY MONTH(date)
";

$result = $conn->query($sql);

$months = [];
$income_data = [];
$expense_data = [];

$month_names = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

while ($row = $result->fetch_assoc()) {
    $months[] = $month_names[$row['month'] - 1];
    $income_data[] = $row['total_income'];
    $expense_data[] = $row['total_expense'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monthly Report</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f3db;
            text-align: center;
            padding: 30px;
        }
        canvas {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #34495e;
        }
    </style>
</head>
<body>

    <h2>Monthly Income vs Expense Report</h2>
    <canvas id="monthlyChart" width="700" height="400"></canvas>

    <script>
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [
                {
                    label: 'Income',
                    data: <?php echo json_encode($income_data); ?>,
                    backgroundColor: '#2ecc71'
                },
                {
                    label: 'Expense',
                    data: <?php echo json_encode($expense_data); ?>,
                    backgroundColor: '#e74c3c'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Financial Overview'
                },
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
    </script>

</body>
</html>
