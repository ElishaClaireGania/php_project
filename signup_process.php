<?php
session_start();
include "admin_dashboard/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $type = $_POST['type'];

    // Ensure password is at least 8 characters long
    if (strlen($password) < 8) {
        echo "<script>alert('Password must be at least 8 characters long!'); window.location='signup.php';</script>";
        exit();
    }

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($type === "Admin") {

        $check_query = "SELECT * FROM admin WHERE Email = ?";
    } else {

        $check_query = "SELECT * FROM users WHERE Email = ?";
    }

    // Check if email already exists
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already registered! Try logging in.'); window.location='signup.php';</script>";
    } else {
        if ($type === "Admin") {
            $query = "INSERT INTO admin (Name, Email, Password) VALUES (?, ?, ?)";
        } else {
            $query = "INSERT INTO users (Name, Email, Password, Type) VALUES (?, ?, ?, ?)";
        }

        $stmt = mysqli_prepare($conn, $query);

        if ($type === "Admin") {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
        } else {
            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashed_password, $type);
        }

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Registration successful! Please log in.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error in registration.'); window.location='signup.php';</script>";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
