<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID parameter is provided
if(isset($_GET['id'])) {
    $note_id = $_GET['id'];

    // Check if the confirmation form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // If user confirms deletion
        if(isset($_POST['confirm']) && $_POST['confirm'] == 'Yes') {
            // Prepare and execute SQL to delete the note
            $sql = "DELETE FROM note WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $note_id);

            if($stmt->execute()) {
                // Note deleted successfully
                echo "<script>alert('Note deleted successfully!');</script>"; // Popup message
            } else {
                // Error occurred while deleting the note
                echo "Error: " . $conn->error;
            }
        } else {
            // User clicked "No" or did not confirm deletion
            echo "<script>alert('Note deletion canceled.');</script>"; // Popup message
        }
        // Redirect to the notes dashboard or any other page after confirmation
        header("Location: dashboard.php");
        exit();
    }
} else {
    // ID parameter is not provided
    echo "Note ID is missing.";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Note</title>
</head>
<body>
    <script>
        // Function to display confirmation dialog
        function confirmDelete() {
            var result = confirm("Are you sure you want to delete this note?");
            if (result) {
                // If user clicks "Yes", submit the form
                document.getElementById("deleteForm").submit();
            } else {
                // If user clicks "No", redirect to the notes dashboard or any other page
                window.location.href = "dashboard.php";
            }
        }
    </script>
    <form id="deleteForm" method="post">
        <input type="hidden" name="confirm" value="Yes">
    </form>
    <script>
        // Call the confirmDelete function when the page loads
        window.onload = confirmDelete;
    </script>
</body>
</html>
