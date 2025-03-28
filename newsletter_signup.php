<?php
session_start();

include "admin_dashboard/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if email already exists
    $check_query = "SELECT * FROM newsletter_subscribers WHERE email = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "You are already subscribed!";
        $_SESSION['message_type'] = "You are not yet subscribed";
    } else {
        // Insert into database
        $query = "INSERT INTO newsletter_subscribers (name, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['message'] = "Subscription successful!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error in subscription. Please try again.";
            $_SESSION['message_type'] = "error";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);


    header("Location: About.php");
    exit();
}
