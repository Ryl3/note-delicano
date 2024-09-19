 <?php
session_start();

// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Grab user input from login form
$input_username = $_POST['username'];
$input_password = $_POST['password'];

// Prepare SQL statement to retrieve user from database
$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists, verify password
    $row = $result->fetch_assoc();
    if (password_verify($input_password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['username'] = $input_username;
        $stmt->close();
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Password!');</script>";
        header("Location: log.php");
        exit();
    }
} else {
    echo "<script>alert('Please Register!');</script>";
    header("Location: reg.php");
    exit();
}

$conn->close();
?> 