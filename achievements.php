<?php
session_start(); // Start session at the beginning

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['achievments'] = $_POST['achievments'];

    header("Location: submit.php"); 
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Achievements</h2>
        
        <form method="POST" action="">
            <label for="Achievments">Achievements:</label>
            <textarea id="achievments" name="achievments" placeholder="Describe your Achievements..." required></textarea>

            <!-- Navigation -->
            <div class="nav-buttons">
                <a href="submit.php" class="prev-btn">Previous</a>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
