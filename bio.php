<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save bio details to session
    $_SESSION['tell'] = $_POST['tell'];

    // Redirect to the next form (education.php)
    header("Location: education.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Bio</h2>  
        
        <form method="POST" action="">
            <label for="tell">Tell us about yourself:</label>
            <textarea id="tell" name="tell" placeholder="Write a short bio..." required></textarea>

            <!-- Navigation -->
            <div class="nav-buttons">
                <a href="personal.php" class="prev-btn">Previous</a>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
