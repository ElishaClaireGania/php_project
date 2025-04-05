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
    <script src="password-validator.js" defer></script>
    <link rel="stylesheet" href="css/login.css">

    <title>Login - E-Library</title>
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <img src="images/logo.png" alt="Biblio-Sage Logo" class="logo">
            <h2>WELCOME BACK TO BIBLIO-SAGE!</h2>
            <h4>Log in to continue your reading journey.</h4>
            <div class="ellipse ellipse1"></div>
            <div class="ellipse ellipse2"></div>
            <div class="ellipse ellipse3"></div>
        </div>
        <div class="right-panel">
            <h3>LOG-IN</h3>
            <form action="login_authentication.php" method="POST">
                <label for="Email">Email:</label>
                <input type="email" name="email" placeholder="Email" required><br>
                <br>

                <label for="password">Password:</label>
                <input type="password" id="password" placeholder="Password" name="password" required minlength="8" maxlength="16" oninput="validatePassword()">
                <span id="password-strength"></span>
                <br>
                <button type="submit" class="login-btn">Log-in</button>
            </form>
            <p><a href="#">Forgot Password?</a></p>
        </div>
    </div>
</body>

</html>