<?php
session_start(); // Start session at the beginning

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "login";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Failed to connect DB: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Fetch data from session
    $name = $_SESSION['name'];
    $birthdate = $_SESSION['birthdate'];
    $email = $_SESSION['email'];
    $tell = $_SESSION['tell'];
    $degree = $_SESSION['degree'];
    $graduation = $_SESSION['graduation'];
    $work = $_SESSION['work'];
    $achievments = $_SESSION['achievments'];

    // SQL query to insert all data into the resume table
    $sql = "INSERT INTO resume (name, birthdate, email, tell, degree, graduation, work, achievments) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssss", $name, $birthdate, $email, $tell, $degree, $graduation, $work, $achievments);

    // Execute and check if successful
    if ($stmt->execute()) {
        // Redirect to confirmation page
        header("Location: resume.php");
        exit(); // Important to stop script execution
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Review & Submit</h2>

        <p>Please review your information before submitting the resume.</p>

        <!-- Summary -->
        <div class="summary">
            <h3>Personal Details</h3>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($_SESSION['birthdate']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>

            <h3>Bio</h3>
            <p><?php echo htmlspecialchars($_SESSION['tell']); ?></p>

            <h3>Education</h3>
            <p><strong>Degree:</strong> <?php echo htmlspecialchars($_SESSION['degree']); ?></p>
            <p><strong>Graduation Year:</strong> <?php echo htmlspecialchars($_SESSION['graduation']); ?></p>

            <h3>Experience</h3>
            <p><?php echo htmlspecialchars($_SESSION['work']); ?></p>

            <h3>Achievements</h3>
            <p><?php echo htmlspecialchars($_SESSION['achievments']); ?></p>
        </div>

        <!-- Final submit -->
        <form method="POST" action="">
            <button type="submit">Submit Resume</button>
        </form>
        
        <!-- Navigation -->
        <div class="nav-buttons">
            <a href="achievements.php" class="prev-btn">Previous</a>
        </div>
    </div>
</body>
</html>
