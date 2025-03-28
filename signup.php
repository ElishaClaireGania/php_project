<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/signup.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <img src="images/logo.png" alt="Biblio-Sage Logo" class="logo">
            <h2>JOIN BIBLIO-SAGE AND START YOUR READING ADVENTURE!</h2>
            <div class="ellipse ellipse1"></div>
            <div class="ellipse ellipse2"></div>
            <div class="ellipse ellipse3"></div>
        </div>
        <div class="right-panel">
            <h3>SIGN UP</h3>
            <form action="signup_process.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder=" Password" required>
                <div class="dropdown-wrapper">
                    <select name="account_type" required>
                        <option value="" disabled selected>Select Account Type</option>
                        <option value="Student">Student</option>
                        <option value="Employee">Employee</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="signup-btn">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>

</html>