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
    <title>Add Expense/Income</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gradient">
<div class="form-container">
    <h2>Add Transaction</h2>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="number" step="0.01" name="amount" placeholder="Amount" required><br>
        <input type="date" name="date" required><br>
        <select name="type" required>
            <option value="">-- Select Type --</option>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select><br>
        <input type="text" name="category" placeholder="Category" required><br>
        <button type="submit">Add</button>
    </form>
    <a href="dashboard.php">← Back to Dashboard</a>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $category = $_POST['category'];

    $sql = "INSERT INTO expenses (user_id, title, amount, date, type, category)
            VALUES ('$user_id', '$title', '$amount', '$date', '$type', '$category')";
    if ($conn->query($sql)) {
        echo "<p style='text-align:center;'>✅ Added successfully!</p>";
    } else {
        echo "<p style='text-align:center;'>❌ Error: " . $conn->error . "</p>";
    }
}
?>
</body>
</html>
