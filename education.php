<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $_SESSION['degree'] = $_POST['degree'];
    $_SESSION['graduation'] = $_POST['graduation'];
    // Redirect to the next form (experience.php)
    header("Location: experience.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Education</h2>  
        
        <form method="POST" action="">
            <label for="degree">Degree</label>
            <textarea id="degree" name="degree" placeholder="Describe your degree..." required></textarea>
            <label for="graduation">Graduation</label>
            <textarea id="graduation" name="graduation" placeholder="Describe your graduation..." required></textarea>
         
            <div class="nav-buttons">
                <a href="bio.php" class="prev-btn">Previous</a>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
