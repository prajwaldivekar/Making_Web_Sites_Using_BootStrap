<?php
$host = "sql104.infinityfree.com";
$dbname = "if0_39382536_washingcentre";     
$username = "if0_39382536";    
$password = "Prajwal2605";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// First get the data from the form
$name = $_POST['customer_name'];
$phone = $_POST['phone'];
$service = $_POST['service'];
$amount = $_POST['amount'];
$remarks = $_POST['remarks'];

// Prepare the statement
$stmt = $conn->prepare("INSERT INTO washing (customer_name, phone, service, amount, remarks) VALUES ($name, $phone, $service, $amount, $remarks)");

if (!$stmt) {
  die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssss", $name, $phone, $service, $amount, $remarks);

if ($stmt->execute()) {
  echo "✅ Receipt saved successfully!";
} else {
  echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
