<?php
$host = 'localhost';
$username = 'root';  // default username for MySQL
$password = 'mysql';      // default password for MySQL (blank in XAMPP/WAMP)
$dbname = 'expense_tracker'; // database name you created

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
