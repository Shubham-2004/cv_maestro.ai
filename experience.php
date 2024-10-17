<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save experience details to session
    $_SESSION['work'] = $_POST['work'];


    // Redirect to the next form (achievements.php)
    header("Location: achievements.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Experience</h2>
        
        <form method="POST" action="">
            <label for="experience">Work Experience:</label>
            <textarea id="work" name="work" placeholder="Describe your experience..." required></textarea>

            <!-- Navigation -->
            <div class="nav-buttons">
                <a href="education.php" class="prev-btn">Previous</a>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
