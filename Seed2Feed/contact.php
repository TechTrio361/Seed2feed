<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address!'); window.history.back();</script>";
        exit;
    }

    // Database connection details
    $servername = "localhost"; // Change as needed
    $username = "root";        // Change as needed
    $password = "";            // Change as needed
    $dbname = "Seed2feed"; // Change as needed

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL Insert Query
    $sql = "INSERT INTO contact_form_submissions (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your message! We will get back to you soon.'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Sorry, something went wrong. Please try again later.'); window.history.back();</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect if accessed without POST method
    header("Location: contact.html");
    exit;
}
?>
