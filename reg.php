<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<style>
    body {
        background-image: url('img/bgpix.png');
        /* Specify the path to your background image */
        background-size: cover;
        /* Cover the entire background */
        /* background-position: center; Center the background image */
        background-repeat: no-repeat;
    }
</style>

<body>

    <div class="navbar">
        <a class="active" href="index.php">Home</a>
        <a href="reg.php">Register</a>
        <a href="log.php">Sign In</a>
    </div>

    <form action="register.php" method="post">
        <br><br>
        <h2>Register</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>