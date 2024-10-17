<?php
session_start();

// Fetch stored data from session
$name = $_SESSION['name'];
$birthdate = $_SESSION['birthdate'];
$email = $_SESSION['email'];
$tell = $_SESSION['tell'];
$degree = $_SESSION['degree'];
$graduation = $_SESSION['graduation'];
$work = $_SESSION['work'];
$achievments = $_SESSION['achievments'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Preview</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .resume-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h3 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 36px;
        }
        h3 {
            font-size: 24px;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        .section {
            margin-bottom: 40px;
        }
        .personal-info {
            display: flex;
            justify-content: space-between;
        }
        .download-options {
            text-align: center;
            margin-top: 40px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="resume-container">
        <h1><?php echo $name; ?>'s Resume</h1>

        <div class="section personal-info">
            <div>
                <p><strong>Name:</strong> <?php echo $name; ?></p>
                <p><strong>Birthdate:</strong> <?php echo $birthdate; ?></p>
            </div>
            <div>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
            </div>
        </div>

        <div class="section">
            <h3>Bio</h3>
            <p><?php echo $tell; ?></p>
        </div>

        <div class="section">
            <h3>Education</h3>
            <p><strong>Degree:</strong> <?php echo $degree; ?></p>
            <p><strong>Graduation Year:</strong> <?php echo $graduation; ?></p>
        </div>

        <div class="section">
            <h3>Experience</h3>
            <p><?php echo $work; ?></p>
        </div>

        <div class="section">
            <h3>Achievements</h3>
            <p><?php echo $achievments; ?></p>
        </div>

        <!-- Provide options to download resume -->
        <div class="download-options">
            <form action="download.php" method="POST">
                <button type="submit" name="pdf">Download PDF</button>
                <button type="submit" name="word">Download Word</button>
            </form>
        </div>
    </div>
</body>
</html>
