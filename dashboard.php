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

// Function to fetch notes
function getNotes($conn) {
    $sql = "SELECT * FROM note ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $notes = array();
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $notes[] = $row;
        }
    }
    return $notes;
   
}

// Display notes
$notes = getNotes($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
       body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0fff1;
        background-image: url('img/1.avif'); /* Specify the path to your background image */
        background-size: cover; /* Cover the entire background */
        background-position: center; /* Center the background image */
        background-repeat: no-repeat; 
        display: flex;
        min-height: 100vh; 

        }

        .container {
            display: flex;
            flex: 1;
            position: relative;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            border-radius: 50px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #cdb4db;
            padding-top: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            box-shadow:  31px 31px 62px #5a5a5a, -31px -31px 62px #ffffff;
            
        }

        .sidebar h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            
        }

        .sidebar ul li a:hover {
            background-color: #555;
        }

        .content {
            flex: 1;
            padding: 50px;
            margin-left: 250px; /* Adjusted to match sidebar width */
        }

        .notes-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            padding: 0;
            margin-top: 20px;
           
        }

        .note {
            flex: 1 1 300px;
            border: 1px solid #ccc;
            padding: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 25px;
            background: #fcf6bd;
            box-shadow:  -16px 16px 32px #8d8d8d,
                         16px -16px 32px #ffffff;
        }

        .note h2 {
            margin-top: 0;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .note p {
            margin: 0;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .note-actions {
            text-align: right;
        }

        .note-actions button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007bff;
            color: #fff;
        }

        .note-actions button:not(:last-child) {
            margin-right: 10px;
        }

        .note-actions button:hover {
            background-color: #0056b3;
        }
        
        .add-note-btn {
            display: flex;
            width: 50px; /* Adjust according to your preference */
            height: 50px; /* Adjust according to your preference */
            line-height: 50px; /* Keep it equal to height for vertically centered text */
            border-radius: 50%; /* Makes it circular */
            text-align: center;
            background-color: #007bff; /* Button background color */
            color: #fff; /* Button text color */
            text-decoration: none; /* Remove default underline */
            
        }

        .add-note-btn:hover {
            background-color: #0056b3; /* Change background color on hover */
        }

        .add-note-btn:active {
            background-color: #003d80; /* Change background color on click */
        }

 
    </style>
</head>
<body>

<div class="container">
<div class="sidebar">
        <h1>Notes Dashboard</h1>
        
        <a href="profile.php"> <!-- Add this line -->
        <img src="img/logo profile.png" alt="Logo" width="150"> <!-- Your logo image -->
       
    </a> <!-- Add this line -->
      
        <ul>
            <li><a href="add_notes.php" class="add-note-btn">+</a></li>
            <li><a href="#" onclick="return confirmLogout()" class="logout">Logout</a></li>
        </ul>
    </div>
    
    <li><a href="add_notes.php" class="add-note-btn">+</a></li>
    <div class="content">
        <div class="notes-container">
            <?php foreach ($notes as $note): ?>
                <div class="note">
                    <h2><?php echo $note['title']; ?></h2>
                    <p><?php echo substr($note['content'], 0, 100); ?></p>
                    <p>Created at: <?php echo $note['created_at']; ?></p>
                    <div class="note-actions">
                        <button onclick="window.location.href='view_notes.php?id=<?php echo $note['id']; ?>'">View</button>
                        <button onclick="window.location.href='edit_notes.php?id=<?php echo $note['id']; ?>'">Edit</button>
                        <button onclick="window.location.href='delete_notes.php?id=<?php echo $note['id']; ?>'">Delete</button>
                    </div>
                </div>
                
                
            <?php endforeach; ?>
        </div>
    </div>
    
</div>



<script>
function confirmLogout() {
    if (confirm("Are you sure you want to log out?")) {
        // If user confirms, redirect to logout page
        window.location.href = "log.php";
    } else {
        // If user cancels, do nothing
        return false;
    }
}

</script>
</body>
</html>
