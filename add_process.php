<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes"; // Update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    
    if (empty($title) || empty($content)) {
        echo "Please fill in both title and content fields";
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO note (title, content) VALUES (?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ss", $title, $content);

        // Execute the statement
        if ($stmt->execute() === true) {
            echo "Note added successfully";
            header("Location: dashboard.php");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

