<?php
ob_start();

$conn = new mysqli("localhost", "root", "", "portfolio_contact");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
$type = $_POST['user_type'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (first_name, last_name, email, user_type, message)
VALUES ('$first','$last','$email','$type','$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: contact.html?sent=1");
    exit();
}

$conn->close();
ob_end_flush();
?>