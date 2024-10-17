<?php
session_start();

if (!isset($_SESSION['name'], $_SESSION['birthdate'], $_SESSION['email'], $_SESSION['tell'], $_SESSION['degree'], $_SESSION['graduation'], $_SESSION['work'], $_SESSION['achievments'])) {
    die("Session variables are not set.");
}

$name = $_SESSION['name'];
$birthdate = $_SESSION['birthdate'];
$email = $_SESSION['email'];
$tell = $_SESSION['tell'];
$degree = $_SESSION['degree'];
$graduation = $_SESSION['graduation'];
$work = $_SESSION['work'];
$achievments = $_SESSION['achievments']; 

if (isset($_POST['pdf'])) {
   
    ob_start(); 
    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "$name's Resume"; ?></title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f4f4f4; /* Light background */
            }
            h1 {
                font-size: 36px;
                text-align: center;
                color: #FF6F20; /* Orange */
                margin-bottom: 20px;
            }
            h3 {
                font-size: 24px;
                color: #009688; /* Teal */
                margin-top: 20px;
                margin-bottom: 10px;
                border-bottom: 2px solid #FF6F20; /* Orange underline */
                padding-bottom: 5px;
            }
            strong {
                font-weight: bold;
                color: #FF6F20; /* Orange */
            }
            p {
                margin: 10px 0;
                font-size: 16px;
                line-height: 1.5;
                color: #333; /* Dark gray */
            }
            .container {
                max-width: 800px; /* Limit width for better readability */
                margin: auto;
                padding: 20px;
                background-color: #ffffff; /* White background for the content */
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }
            .avatar {
            width: 80px; /* Avatar size */
            height: 80px;
            border-radius: 50%; /* Circular shape */
            position: absolute; /* Positioning avatar */
            top: 27px; /* Position from top */
            right: 370px; /* Position from right */
            object-fit: cover; /* Cover the area */
            border: 2px solid #FF6F20; /* Orange border */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
        }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1><?php echo "$name's Resume"; ?></h1>
            <hr />
            <h3>Personal Details</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>

            <img src='https://png.pngtree.com/png-vector/20190710/ourlarge/pngtree-user-vector-avatar-png-image_1541962.jpg' class='avatar'>
            <hr/> 
            <p><strong>Birthdate:</strong> <?php echo $birthdate; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <h3>Bio</h3>
            <p><?php echo $tell; ?></p>
            <h3>Education</h3>
            <p><strong>Degree:</strong> <?php echo $degree; ?></p>
            <p><strong>Graduation Year:</strong> <?php echo $graduation; ?></p>
            <h3>Experience</h3>
            <p><?php echo $work; ?></p>
            <h3>Achievements</h3>
            <p><?php echo $achievments; ?></p>
        </div>
    </body>
    </html>
    <?php
    $content = ob_get_clean(); 
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="resume.html"');
    echo $content; // Output the content for download
    exit; // Exit to prevent further output
}



if (isset($_POST['word'])) {
    header('Content-Type: application/msword');
    header('Content-Disposition: attachment; filename="resume.doc"');
    $wordContent = "
    <html>
    <head>
    <meta charset='utf-8'>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4; /* Light background */
        }
        h1 {
            font-size: 36px;
            text-align: center;
            color: #FF6F20; /* Orange */
            margin-bottom: 20px;
        }
        h3 {
            font-size: 24px;
            color: #009688; /* Teal */
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 2px solid #FF6F20; /* Orange underline */
            padding-bottom: 5px;
        }
        strong {
            font-weight: bold;
            color: #FF6F20; /* Orange */
        }
        p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 1.5;
            color: #333; /* Dark gray */
        }
        .container {
            max-width: 800px; /* Limit width for better readability */
            margin: auto;
            padding: 20px;
            background-color: #ffffff; /* White background for the content */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Positioning for avatar */
        }
        .avatar {
            width: 80px; /* Avatar size */
            height: 80px;
            border-radius: 50%; /* Circular shape */
            position: absolute; /* Positioning avatar */
            top: 20px; /* Position from top */
            right: 20px; /* Position from right */
            object-fit: cover; /* Cover the area */
            border: 2px solid #FF6F20; /* Orange border */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
        }
    </style>
    </head>
    <body>
        <div class='container'>
            <h1>$name's Resume</h1>
            <img src='https://png.pngtree.com/png-vector/20190710/ourlarge/pngtree-user-vector-avatar-png-image_1541962.jpg' class='avatar'> 
            <hr />
            <h3>Personal Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Birthdate:</strong> $birthdate</p>
            <p><strong>Email:</strong> $email</p>
            <h3>Bio</h3>
            <p>$tell</p>
            <h3>Education</h3>
            <p><strong>Degree:</strong> $degree</p>
            <p><strong>Graduation Year:</strong> $graduation</p>
            <h3>Experience</h3>
            <p>$work</p>
            <h3>Achievements</h3>
            <p>$achievments</p>
        </div>
    </body>
    </html>
";



    
    echo $wordContent; // Output the Word content
    exit; 
}
?>
