<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save personal details to session
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['birthdate'] = $_POST['birthdate'];
    $_SESSION['email'] = $_POST['email'];

    // Redirect to the next form (bio.php)
    header("Location: bio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Personal Details</h2>
        
        <!-- Form to collect user data -->
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <!-- Navigation -->
            <div class="nav-buttons">
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</body>
</html>
