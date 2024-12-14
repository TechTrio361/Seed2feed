<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $donorName = htmlspecialchars(trim($_POST['donorName']));
    $donorType = htmlspecialchars(trim($_POST['donorType']));
    $foodDetails = htmlspecialchars(trim($_POST['foodDetails']));

    // Basic validation
    if (empty($donorName) || empty($donorType) || empty($foodDetails)) {
        echo "<h2>Error: All fields are required.</h2>";
        echo "<a href='food-donations.html'>Go back to the form</a>";
        exit();
    }

    // Database connection details
    $servername = "localhost";
    $username = "root";  // Update as needed
    $password = "";      // Update as needed
    $dbname = "seed2feed"; // Update as needed

    try {
        // Create connection using PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO FoodDonations (donorName, donorType, foodDetails) 
                                VALUES (:donorName, :donorType, :foodDetails)");
        $stmt->bindParam(':donorName', $donorName);
        $stmt->bindParam(':donorType', $donorType);
        $stmt->bindParam(':foodDetails', $foodDetails);

        // Execute the query
        $stmt->execute();

        echo "<h2>Thank you, $donorName!</h2>";
        echo "<p>Your donation has been recorded successfully.</p>";
        echo "<a href='Food-initiative.html'>Go back to Home</a>";
    } catch (PDOException $e) {
        echo "<h2>Error: Unable to process your request.</h2>";
        echo "<p>" . $e->getMessage() . "</p>";
        echo "<a href='food-donations.html'>Go back to the form</a>";
    }

    // Close the connection
    $conn = null;
} else {
    // If request method is not POST
    echo "<h2>Error: Invalid request method.</h2>";
    echo "<a href='food-donations.html'>Go back to the form</a>";
}
?>
