<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $note_id = $_GET['id'];
    
    // Prepare and execute the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM note WHERE id = ?");
    $stmt->bind_param("i", $note_id);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if the note exists
    if ($result->num_rows > 0) {
        $note = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0fff1;
            background-image: url('img/1.avif'); /* Specify the path to your background image */
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */
        background-repeat: no-repeat;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #caf0f8;
            padding: 50px;
            border-radius: 71px;
            background: #fcf6bd;
            box-shadow:  -41px 41px 82px #747474, 41px -41px 82px #ffffff;
        }

        h1 {
            font-size: 24px;
            margin-top: 0;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Note</h1>
        <p><strong>Title: </strong><?php echo $note['title']; ?></p>
        <p><strong>Content: </strong><?php echo $note['content']; ?></p>
        <p><strong>Created at: </strong><?php echo $note['created_at']; ?></p>
        <button class="btn" onclick="window.location.href='dashboard.php'">Back</button>
        <button class="btn" onclick="window.location.href='edit_notes.php?id=<?php echo $note['id']; ?>'">Edit Note</button>
        <form action="delete_notes.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
            <button class="btn" type="submit">Delete Note</button>
        </form>
    </div>
</body>
</html>

<?php
    } else {
        echo "Note not found.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
