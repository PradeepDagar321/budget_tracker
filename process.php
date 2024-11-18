<?php
$conn = new mysqli("localhost", "root", "", "budget_tracker");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = $_POST['date'];
$description = $_POST['description'];
$amount = $_POST['amount'];

$sql = "INSERT INTO expenses (date, description, amount) VALUES ('$date', '$description', '$amount')";

if ($conn->query($sql) === TRUE) {
    echo "Expense added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


header("Location: index.php");
exit;
?>