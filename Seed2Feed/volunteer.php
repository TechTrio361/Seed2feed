<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost"; // Replace with your host
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "Seed2feed"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $role = $conn->real_escape_string($_POST['role']);

    // Insert data into table
    $sql = "INSERT INTO volunteers (name, email, phone, role) VALUES ('$name', '$email', '$phone', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Form submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
