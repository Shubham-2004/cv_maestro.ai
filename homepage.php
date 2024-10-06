<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Maestro AI - User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- For icons -->
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Drawer -->
        <div class="drawer" id="drawer">
            <div class="user-profile">
                <?php 
                if(isset($_SESSION['email'])){
                    $email=$_SESSION['email'];
                    $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");

                    // Check if the query returned any result
                    if(mysqli_num_rows($query) > 0) {
                        $row = mysqli_fetch_array($query); // Fetch user details
                        echo "<img src='https://brightrealty.com.au/wp-content/uploads/av-men.jpg ' alt='User Avatar'>";
                        echo "<h2>" . htmlspecialchars($row['firstName']) . " " . htmlspecialchars($row['lastName']) . "</h2>";
                        echo "<p>" . htmlspecialchars($row['email']) . "</p>";
                    } else {
                        // Handle case when no user is found
                        echo "<h2>User not found</h2>";
                    }
                } else {
                
                    echo "<h2>Guest</h2>";
                    echo "<p>Please log in to see your details.</p>";
                }
                ?>
            </div>

            <ul class="drawer-menu">
                <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="personal.php"><i class="fas fa-file-alt"></i> Create Resume</a></li>
                <li><a href="resume_enhancer.php"><i class="fas fa-edit"></i> Enhance Resume</a></li>
                <li><a href="saved_resumes.php"><i class="fas fa-save"></i> Saved Resumes</a></li>
                <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>

            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <button class="menu-toggle" onclick="toggleDrawer()"><i class="fas fa-bars"></i></button>
                <h1>Welcome to CV Maestro AI </h1>
            </div>
            <div class="content">
                <?php if (isset($row)): ?>
                    <p style="font-size: 1.8rem;">Hello, <?php echo htmlspecialchars($row['firstName']); ?>! Ready to craft your perfect resume?</p>
                <?php else: ?>
                    <p style="font-size: 1.8rem;">Welcome! Ready to craft your perfect resume?</p>
                <?php endif; ?>
                <p>CV Maestro AI helps you create, enhance, and manage your resumes seamlessly. Explore the features below to get started!</p>

                <!-- Additional Features Section -->
                <div class="features-section">
                    <h3>Why Choose CV Maestro AI?</h3>
                    <div class="features-grid">
                        <div class="feature-card">
                            <i class="fas fa-file-alt"></i>
                            <h4>Create Resume</h4>
                            <p>Easily build your resume with our step-by-step guide.</p>
                        </div>
                        <div class="feature-card">
                            <i class="fas fa-edit"></i>
                            <h4>Enhance Resume</h4>
                            <p>Use AI to optimize and improve your existing resume.</p>
                        </div>
                        <div class="feature-card">
                            <i class="fas fa-save"></i>
                            <h4>Save Resumes</h4>
                            <p>Save multiple versions of your resume for different job applications.</p>
                        </div>
                        <div class="feature-card">
                            <i class="fas fa-cog"></i>
                            <h4>Customization</h4>
                            <p>Customize templates and styles to match your professional tone.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDrawer() {
            var drawer = document.getElementById('drawer');
            drawer.classList.toggle('open');
        }
    </script>
</body>
</html>
