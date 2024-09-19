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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve note ID from URL parameter
    $note_id = $_GET['id'];

    // Retrieve updated title and content from the form
    $updated_title = $_POST['title'];
    $updated_content = $_POST['content'];

    // Update note in the database
    $sql = "UPDATE note SET title='$updated_title', content='$updated_content' WHERE id=$note_id";

    if ($conn->query($sql) === TRUE) {
        echo "Note updated successfully";
        header("Location: dashboard.php");
    } else {
        echo "Error updating note: " . $conn->error;
    }
}

// Retrieve note information based on the ID passed through URL parameter
$note_id = $_GET['id'];
$sql = "SELECT * FROM note WHERE id=$note_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $note_title = $row['title'];
    $note_content = $row['content'];
} else {
    echo "Note not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('img/1.avif'); /* Specify the path to your background image */
            background-size: cover; /* Cover the entire background */
            /* background-position: center; Center the background image */
            background-repeat: no-repeat;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #cdb4db;
            padding: 20px;
            border-radius: 50px;
            background: #fcf6bd;
            box-shadow:  31px 31px 62px #5a5a5a, -31px -31px 62px #ffffff;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .btn-back {
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

.btn-back:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Update Note</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $note_id; ?>">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="<?php echo $note_title; ?>"><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content"><?php echo $note_content; ?></textarea><br>
            <a href="dashboard.php" class="btn-back">Back</a>
            <input type="submit" value="Update Note">
        </form>
    </div>
</body>
</html>
