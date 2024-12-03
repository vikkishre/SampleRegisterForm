<?php
// Database connection settings
$servername = "localhost"; // Database server
$username = "root";        // MySQL username
$password = "vivek";            // MySQL password
$dbname = "registration"; // Name of the database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);

    // Insert the form data into the database
    $sql = "INSERT INTO registrations (name, email, phone, dob, gender) 
            VALUES ('$name', '$email', '$phone', '$dob', '$gender')";

    if ($conn->query($sql) === TRUE) {
        // Display the success message and submitted data
        echo "
        <h2>Registration Successful!</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Date of Birth:</strong> $dob</p>
        <p><strong>Gender:</strong> $gender</p>
        ";
    } else {
        // Handle SQL errors
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<p>Invalid request method.</p>";
}

// Close the database connection
$conn->close();
?>
