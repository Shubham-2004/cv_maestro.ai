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
        
        <!-- Navigation Links -->
        <div class="form-navigation">
            <a href="bio.html">Bio</a>
            <a href="education.html">Education</a>
            <a href="experience.html">Experience</a>
            <a href="achievements.html">Achievements</a>
            <a href="submit.html">Review & Submit</a>
        </div>
        
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <!-- Navigation -->
            <div class="nav-buttons">
                <a href="bio.html" class="next-btn">Next</a>
            </div>
        </form>
    </div>
</body>
</html>
