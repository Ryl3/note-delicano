<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
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
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 111px;
            background: #fcf6bd;
            box-shadow:  31px 31px 62px #5a5a5a, -31px -31px 62px #ffffff;
        }
        h1 {
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            text-transform: uppercase;
            width: 100%;
            max-width: 200px; /* Added for responsiveness */
            margin: 0 auto; /* Center align */
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
       .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            text-transform: uppercase;
            width: 100%;
            max-width: 200px; /* Added for responsiveness */
            margin: 10px auto; /* Center align and add spacing */
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .button-wrapper {
            text-align: center; /* Align buttons in the center */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Note</h1>
        <form action="add_process.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>
            <input type="submit" value="Add Note">
        </form>
        <div class="button-wrapper">
            <button class="btn" onclick="window.location.href='dashboard.php'">Back</button>
        </div>
    </div>
</body>
</html>
