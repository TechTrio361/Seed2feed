<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost"; // Replace with your host
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "seed2feed"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['orgName'])) {
        // Organization Delivery Form Submission
        $orgName = $conn->real_escape_string($_POST['orgName']);
        $contactPerson = $conn->real_escape_string($_POST['contactPerson']);
        $contactEmail = $conn->real_escape_string($_POST['contactEmail']);
        $deliveryDetails = $conn->real_escape_string($_POST['deliveryDetails']);
        $schoolSelected = $conn->real_escape_string($_POST['schoolSelection']);

        $sql = "INSERT INTO food_deliveries (org_name, contact_person, contact_email, delivery_details, school_selected) 
                VALUES ('$orgName', '$contactPerson', '$contactEmail', '$deliveryDetails', '$schoolSelected')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Food delivery details submitted successfully!'); window.location.href='school-feeding.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['schoolName'])) {
        // School Registration Form Submission
        $schoolName = $conn->real_escape_string($_POST['schoolName']);
        $contactPerson = $conn->real_escape_string($_POST['schoolContact']);
        $contactEmail = $conn->real_escape_string($_POST['schoolEmail']);
        $schoolLocation = $conn->real_escape_string($_POST['schoolLocation']);
        $studentsNumber = intval($_POST['studentsNumber']);

        $sql = "INSERT INTO school_registrations (school_name, contact_person, contact_email, school_location, students_number) 
                VALUES ('$schoolName', '$contactPerson', '$contactEmail', '$schoolLocation', $studentsNumber)";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('School registered successfully!'); window.location.href='school-feeding.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>
