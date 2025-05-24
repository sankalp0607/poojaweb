<?php
// Database connection details
$servername = "localhost"; // Server name (usually localhost)
$username = "root"; // Database username (default is 'root' for local setup)
$password = ""; // Database password (default is empty for local setup)
$dbname = "pooja_booking"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gotra = $_POST['gotra'];
    $pooja = $_POST['pooja'];
    $date = $_POST['date'];

    // SQL query to insert form data into database
    $sql = "INSERT INTO bookings (name, phone, gotra, pooja, date) 
            VALUES ('$name', '$phone', '$gotra', '$pooja', '$date')";

    // Execute the query and check if insertion was successful
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the form page with success message
        header("Location: tem.html?success=1"); // Redirect to index.php with success flag
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
